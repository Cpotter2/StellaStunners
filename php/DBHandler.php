<?php

/*
DBHandler - Connects to the MySQL database to get problem data, etc.
*/
abstract class DBHandler {

	protected $connection;

	/* The constructor simply carries the arguments for the mysqli
	   constructor and starts a connection.*/
	protected function __construct($hostname, $username, $password, $database) {
		$this->connection = new mysqli($hostname, $username, $password, $database);

		if ($this->connection->connect_errno) {
			throw new Exception("MySQLi connection error: " . ($this->connection->connect_error));
		}
	}

	/* Closes the connection */
	function close() {
		$this->connection->close();
		unset($this->connection);
	}

	/* Automatically closes connection */
	function __destruct() {
		if (isset($this->connection)) { $this->close(); }
	}

	/* Proxy functions */
	function query($queryString) { return $this->connection->query($queryString); }
	function realEscapeString($str) { return $this->connection->real_escape_string($str); }
	function sqlState() { return $this->connection->sqlstate; }
	function error() { return $this->connection->error; }
}

/* Connects to the web database to authenticate users */
class Admin extends DBHandler {
	
	function __construct() {
		include(DOCUMENT_ROOT."/db_logins/admin.php");
                parent::__construct($hn, $un, $pw, $db);
	}
}

/* The Stunner class is the type of DBHandler that will access or edit the stunners database. */
abstract class Stunner extends DBHandler {

	function getProblemByTitle($title) {
		$result = $this->query("SELECT * FROM problems WHERE title = '$title'");
		if (!$result) {
			throw new Exception("MySQLi query error: " . ($this->connection->error));
		} else {
			$row = $result->fetch_assoc();
		}
		return ($result->num_rows === 0 ? NULL : $this->getProblem($row["id"]));
	}
	
	/* Grabs the row of the problems database whose id is $index.
	   Returns the data in the form of a Problem object. */
	function getProblem($index) {
		$result = $this->query("SELECT * FROM problems WHERE id = '$index' LIMIT 1");
		if (!$result) {
			throw new Exception("MySQLi query error: " . ($this->connection->error));
		}
		$tagResult = $this->query("SELECT * FROM tagmap WHERE problem_id = '$index' ORDER BY tag_id ASC");
		$tags = array();
		while ($row = $tagResult->fetch_assoc()) {
			$tags[] = $this->getTagByID($row["tag_id"])->getName();
		}
		return ($result->num_rows === 0 ? NULL : new Problem($result, $tags));
	}

	function getTagByID($tagID) {
		$result = $this->query("SELECT * FROM tags WHERE id = $tagID LIMIT 1");
		return ($result->num_rows === 0 ? NULL : new Tag($result));
	}

	function getTagByName($tagName) {
		$result = $this->query("SELECT * FROM tags WHERE name = \"$tagName\"");
		if (!$result) {
			throw new Exception("MySQLi query error: " . ($this->connection->error));
		}
		return ($result->num_rows === 0 ? NULL : new Tag($result));
	}

	function getTagNames() {
		$tagList = array();
		$result = $this->query("SELECT name FROM tags");
		while ($row = $result->fetch_assoc()) {
			$tagList[] = $row[Tag::NAME];
		}
		return $tagList;
	}
}

/* Connects to the stunners database from the stella account, which can only read data. */
class Stella extends Stunner {

	function __construct() {
		include(DOCUMENT_ROOT."/db_logins/stella.php");
		parent::__construct($hn, $un, $pw, $db);
	}
}

/* Connects to the stunners database from an account that has write privileges. */
class Editor extends Stunner {

	function __construct() {
		if (!isset($_SESSION['user'])) {
			throw new Exception("No user is logged in.");
		} else {
			include(DOCUMENT_ROOT."/db_logins/editor.php");
			parent::__construct($hn, $un, $pw, $db);
		}
	}
}

/* This class is mostly syntactic sugar. I like the convention of using class constants
   as opposed to hardcoding keywords in our code, as the fields of our database may be
   added, removed, or changed. */
class Problem {
	
	private $assoc;

	const ID = "id";
	const TITLE = "title";
	const PROB_TEXT = "probtext";
	const PROB_IMG = "probimage";
	const PROB_IMG_SIZE = "probimagesize";
	const SOL_TEXT = "soltext";
	const SOL_IMG = "solimage";
	const TAGS = "tags";

	function __construct($result, $tags = NULL) {
		$this->assoc = $result->fetch_assoc();
		$this->assoc[self::TAGS] = ($tags == NULL ? array() : $tags);
	}

	function getID() { return $this->assoc[self::ID]; }
	function getTitle() { return $this->assoc[self::TITLE]; }
	function getProbText() { return $this->assoc[self::PROB_TEXT]; }
	function getProbImg() {return $this->assoc[self::PROB_IMG]; }
	function getProbImgSize() {return $this->assoc[self::PROB_IMG_SIZE];}
	function getProbImgURL() {
		// Ripped from https://stackoverflow.com/questions/4517067/remove-a-string-from-the-beginning-of-a-string
		$images = glob(DOCUMENT_ROOT."/images/stunners/".$this->getID()."/pfig1.*");
		if ($images) {
			return preg_replace('/^' . preg_quote(DOCUMENT_ROOT, '/') . '/', '', $images[0]);
		}
		// To Aidan: I changed these so that we can support all image types and eventually extend
		// the code to allow for multiple problem/solution images
		/*if (file_exists(DOCUMENT_ROOT."/images/stunners/".$this->assoc[self::ID]."/pfig1.png")){
			return "/images/stunners/".$this->assoc[self::ID]."/pfig1.png";
		}*/
	}
	function getSolText() { return $this->assoc[self::SOL_TEXT]; }
	function getSolImg() { return $this->assoc[self::SOL_IMG]; }
	function getSolImgURL() {
		$images = glob(DOCUMENT_ROOT."/images/stunners/".$this->getID()."/sfig1.*");
		if ($images) {
			return preg_replace('/^' . preg_quote(DOCUMENT_ROOT, '/') . '/', '', $images[0]);
		}
		/*if (file_exists(DOCUMENT_ROOT."/images/stunners/".$this->assoc[self::ID]."/sfig1.png")){
		 return "/images/stunners/".$this->assoc[self::ID]."/sfig1.png";
		}*/
	}

	function getTags() { return $this->assoc[self::TAGS]; }

	function toJSON() {
		$this->assoc['originalProbImage'] = ((bool) $this->getProbImg() ? $this->getProbImgURL() : "");
		$this->assoc['originalSolImage'] = ((bool) $this->getSolImg() ? $this->getSolImgURL() : "");
		return json_encode($this->assoc);
	}

}

class Tag {

	private $assoc;

	const ID = "id";
	const NAME = "name";

	function __construct($result) { $this->assoc = $result->fetch_assoc(); }

	function getID() { return $this->assoc[self::ID]; }
	function getName() { return $this->assoc[self::NAME]; }
}

?>

