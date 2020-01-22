<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");
function setId($ID)
{
	$problem_id = $ID;
	return $problem_id;
}
?>

<?php
$title = "Problems";
$pageName = "Problems";
include_once(DOCUMENT_ROOT . "/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT . "/includes/sidenav.php") ?>

<?php require_once(DOCUMENT_ROOT . "/php/DBHandler.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<p><a href="editor">Problem Editor</a> <a href="checkout.php">Document Creator</a></p>

	<table id="problems_table">
		<!-- Top Row -->
		<tr>
			<th> Stella Index </th>
			<th> Title</th>
		</tr>

		<?php
		$handle = new Stella();
		//	if (!isset($GET["tag"]){
		//		$result = $handle->query('SELECT problems.id, title FROM tagmap, problems WHERE tagmap.tag_id = '$_GET["tag"]' AND tagmap.problem_id = problems.id ORDER BY problem_id');
		//	}else{
		$result = $handle->query("SELECT id, title FROM problems ORDER BY id");
		//	}
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td><a href=\"show-problem.php?id=$row[id]\">$row[id]</td><td>$row[title]</td></tr>";
		}
		?>
	</table>

	<!-- <p><a href="checkout.php">Make Document</a></p> -->

</div>
<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>