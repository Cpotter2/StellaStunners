<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$numtags = 0;

$tag = 0;
$tag2 = 0;
$tag3 = 0;
// If the id isn't specified or doesn't have an entry, then redirect to problems/index.php
if (!isset($_GET["tag"]) or !is_numeric($_GET["tag"])) {
	redirect("/problems");
	exit();
} 

// Retrieve tags from GET 
$numtags++;
$tag1 = $_GET["tag"];
if (isset($_GET["tag2"]) and is_numeric($_GET["tag2"])) {
	$numtags++;
	$tag2 = $_GET["tag2"];
	if (isset($_GET["tag3"]) and is_numeric($_GET["tag3"])) {
		$numtags++;
		$tag3 = $_GET["tag3"];
	}
}

// Get problems from the database that match the tags
require_once(DOCUMENT_ROOT."/php/DBHandler.php");

$handle = new Stella();
$result = $handle->query('SELECT name FROM tags WHERE id=' . $tag1 . ' OR id=' . $tag2 . ' OR id=' . $tag3);
$pageHeader = "Showing: " . $result->fetch_assoc()["name"];
while ($row = $result->fetch_assoc()) {
	$pageHeader = $pageHeader . " and " . $row["name"];
}

$pageHeader = str_replace('set', 'Problem Set ', $pageHeader);
$title = str_replace('Showing: ', '', $pageHeader);
$checkoutLink = "checkout.php?tags[]=$tag1";
if (isset($_GET["tag2"])) $checkoutLink = $checkoutLink . "&tags[]=$tag2";
if (isset($_GET["tag3"])) $checkoutLink = $checkoutLink . "&tags[]=$tag3";

include_once(DOCUMENT_ROOT."/includes/header.php");
include_once(DOCUMENT_ROOT."/includes/sidenav.php")
?>


<div id="content">
	<div id="content-header">
		<h1><?php echo $pageHeader ?></h1>
		<?php echo "<a href=\"$checkoutLink\"><button>";?>Create a document with these problems</button></a>
	</div>
	<table id="problems_table">
                <!-- Top Row -->
                <tr>
                        <th> Stella Index </th>
                        <th> Title</th>
                </tr>
	        <?php
		$handle = new Stella();
		$result;
		if ($numtags == 1){
			$result = $handle->query('SELECT problems.id, title 
								FROM tagmap, problems 
								WHERE tagmap.tag_id = '.$_GET["tag"].' AND tagmap.problem_id = problems.id 
								ORDER BY problems.id');
		} else if ($numtags == 2) {
			$result = $handle->query('SELECT DISTINCT problems.id, title 
								FROM tagmap, problems 
								INNER JOIN tagmap a ON a.problem_id = problems.id
								INNER JOIN tagmap b ON b.problem_id = problems.id
								WHERE a.tag_id = '.$_GET["tag"].' AND b.tag_id = '.$_GET["tag2"].' 
								ORDER BY problems.id;');
		} else if ($numtags == 3) {
			$result = $handle->query('SELECT DISTINCT problems.id, title 
								FROM tagmap, problems 
								INNER JOIN tagmap a ON a.problem_id = problems.id
								INNER JOIN tagmap b ON b.problem_id = problems.id
								INNER JOIN tagmap c ON c.problem_id = problems.id
								WHERE a.tag_id = '.$_GET["tag"].' AND b.tag_id = '.$_GET["tag2"].' AND c.tag_id = '.$_GET["tag3"].' 
								ORDER BY problems.id;');
		}
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td><a href=\"show-problem.php?id=$row[id]\">$row[id]</td><td>$row[title]</td></tr>";
		}
		?>
        </table>

	<!-- <p><a href="checkout.php">Make Document</a></p> -->


</div>
<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>

