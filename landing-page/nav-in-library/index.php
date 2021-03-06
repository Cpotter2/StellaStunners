<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");
?>

<?php
$title = "BROWSING, FINDING, AND DOWNLOADING";
$pageName = "BROWSING, FINDING, AND DOWNLOADING";
include_once(DOCUMENT_ROOT . "/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT . "/includes/sidenav.php") ?>

<?php require_once(DOCUMENT_ROOT . "/php/DBHandler.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>


	<table id="problems_table" class="nav-in-library">
    <thead>
			<tr>
				<th>Title</th>

			</tr>
		</thead>

		<tbody>

			<tr>
				<td><a href="/tutorial/browse.php" target="_blank">Browsing by Number</a></td>
			</tr>

			<tr>
				<td><a href="/tutorial/find-prob-by-topic.php" target="_blank">Finding a Problem by Topic</a></td>
			</tr>

			<tr>
				<td><a href="/tutorial/one-prob.php" target="_blank">Creating a PDF of a Problem</a></td>
			</tr>

			<tr>
				<td><a href="/tutorial/several-prob.php" target="_blank">Creating a PDF of a Set of Problems from Scratch</a></td>
			</tr>
			<tr>

			<tr>
				<td><a href="/tutorial/make-and-use-prob-set.php" target="_blank">Using the Problem Sets</a></td>
			</tr>

			<tr>
				<td><a href="/tutorial/create-pdf-from-prob-set.php" target="_blank">Creating a PDF from a Problem Set</a></td>
			</tr>

      <tr>
				<td><a href="/tutorial/intro-to-intro-prob.php" target="_blank">Introduction to the Introductory Problems</a></td>
			</tr>

		</tbody>
	</table>

</div>
<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>
