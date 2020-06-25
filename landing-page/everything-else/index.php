<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");
?>

<?php
$title = "EVERYTHING ELSE";
$pageName = "EVERYTHING ELSE";
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
				<td>6.1</td>
				<td><a href="/copyright">A Note on Sources</a></td>
			</tr>

			<tr>
				<td>6.2</td>
				<td><a href="/landing-page/everything-else/Bibliography.xls" target="_blank">Bibliography</a></td>
			</tr>

			<tr>
				<td>7</td>
				<td><a href="/background/bio.php">Stella's Biography</a></td>
			</tr>

			<tr>
				<td>8</td>
				<td><a href="/acknowledgements.php">Acknowledgements</a></td>
			</tr>

			<tr>
				<td>9</td>
				<td><a href="/contact">Contact Us</a></td>
			</tr>

			<tr>
				<td>0</td>
				<td><a href="/problems/editor">Problem Editor</a></td>
			</tr>
		</tbody>
	</table>

</div>
<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>
