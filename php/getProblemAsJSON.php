<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");

?>

<?php include_once(DOCUMENT_ROOT . "/php/DBHandler.php") ?>

<?php
if (!isset($_GET['id'])) {
	die("No problem ID specified.");
}

$handle = new Stella();
switch ($_GET['addType']) {
	case 'title':
		if (!$problem = $handle->getProblemByTitle($_GET['id'])) {
			die("Could not find problem with title $_GET[id].");
		}
		break;
	case 'id':
		if (!$problem = $handle->getProblem($_GET['id'])) {
			die("Could not find problem with id $_GET[id].");
		}
		break;

	default:
		die('Unrecognized search type!');
}

$handle->close();

echo $problem->toJSON();
?>




