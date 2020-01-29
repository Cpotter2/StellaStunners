<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");
?>

<?php
$title = "WELCOME";
$pageName = "WELCOME";
include_once(DOCUMENT_ROOT . "/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT . "/includes/sidenav.php") ?>

<?php require_once(DOCUMENT_ROOT . "/php/DBHandler.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>


	<table id="problems_table" class="everything-else">
		<thead>
			<tr>
				<th>Document Index</th>
				<th>Title</th>

			</tr>
		</thead>

		<tbody>

			<tr>
				<td>1.3</td>
				<td><a href="/landing-page/welcome/foreword-steve.php">Foreword (Steve)</a></td>
			</tr>

			<tr>
				<td>1.4</td>
				<td><a href="/landing-page/welcome/preface-rudd.php" target="_blank">Preface (Rudd)</a></td>
			</tr>

		</tbody>
	</table>

</div>
<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>
