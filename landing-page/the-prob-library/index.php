<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");
?>

<?php
$title = "THE PROBLEM LIBRARY";
$pageName = "THE PROBLEM LIBRARY";
include_once(DOCUMENT_ROOT . "/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT . "/includes/sidenav.php") ?>

<?php require_once(DOCUMENT_ROOT . "/php/DBHandler.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>


	<table id="problems_table" class="the-prob-library">
    <thead>
			<tr>
				<th>Document Index</th>
				<th>Title</th>

			</tr>
		</thead>

		<tbody>

			<tr>
				<td>3.1</td>
				<td><a href="/tutorial/guided-tours.php" target="_blank">Guided Tours (with links)</a></td>
			</tr>

			<tr>
				<td>3.2</td>
				<td><a href="/stella_system/topic_overview.php" target="_blank">Topic Overview</a></td>
			</tr>

			<tr>
				<td>3.3</td>
				<td><a href="/stella_system/topic.php" target="_blank">SDS by topic</a></td>
			</tr>

			<tr>
				<td>3.4</td>
				<td><a href="/stella_system/stella_num.php" target="_blank">SDS by Stella Number</a></td>
			</tr>

		</tbody>
	</table>

</div>
<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>
