<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");
?>

<?php
$title = "PLAY";
$pageName = "PLAY!";
include_once(DOCUMENT_ROOT . "/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT . "/includes/sidenav.php") ?>

<?php require_once(DOCUMENT_ROOT . "/php/DBHandler.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

<p>Since this website is all about solving problems, we start by inviting you to doff your teacher hat
  and to take some time to play with a few problems selected just for you.
</p>

	<table id="problems_table" class="play">
    <thead>
			<tr>
				<th>Stella Index</th>
				<th>Title</th>

			</tr>
		</thead>

		<tbody>

			<tr>
				<td><a href="http://stella.cs.oberlin.edu/problems/show-problem.php?id=1040.11">1040.11</a></td>
				<td>Ten Peach Trees</td>
			</tr>

			<tr>
				<td><a href="http://stella.cs.oberlin.edu/problems/show-problem.php?id=1610.11">1610.11</a></td>
				<td>One Million</td>
			</tr>

			<tr>
				<td><a href="http://stella.cs.oberlin.edu/problems/show-problem.php?id=1550.18">1550.18</a></td>
				<td>Jacob's Bumper</td>
			</tr>

			<tr>
				<td><a href="http://stella.cs.oberlin.edu/problems/show-problem.php?id=3060.51">3060.51</a></td>
				<td>Red and Blue Point Line Segment</td>
			</tr>
			<tr>

			<tr>
				<td><a href="http://stella.cs.oberlin.edu/problems/show-problem.php?id=3420.29">3420.29</a></td>
				<td>Midline Triangle</td>
			</tr>

		</tbody>
	</table>

  <p>Think about how you’re thinking as you work on them; think about how you feel when you get one or when you get stuck. </p>

  <p> When you’ve had enough of that for now, you’ll probably want to familiarize yourself with various features of the website.
    I suggest heading over to the Problem Library Organization menu to see how the library itself is put together (there’s a guided tour).
</p>

</div>
<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>
