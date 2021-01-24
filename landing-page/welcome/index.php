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
				<th>Title</th>

			</tr>
		</thead>

		<tbody>

			<tr>
				<td><a href="/landing-page/welcome/oberlin-welcome.php">Welcome</a></td>
			</tr>

			<tr>
				<td><a href="/landing-page/welcome/foreword-steve.php">Foreword (Steve Meiring)</a></td>
			</tr>

			<tr>
				<td><a href="/landing-page/welcome/preface-rudd.php" target="_blank">Preface (Rudd Crawford)</a></td>
			</tr>

			<tr>
				<td><a href="/landing-page/welcome/quick-problems.php" target="_blank">Getting some Problems for your Students Quickly</a></td>
			</tr>

		</tbody>
	</table>

</div>
<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>