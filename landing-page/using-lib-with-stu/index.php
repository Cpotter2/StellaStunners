<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");
?>

<?php
$title = "USING THE LIBRARY WITH STUDENTS";
$pageName = "USING THE LIBRARY WITH STUDENTS";
include_once(DOCUMENT_ROOT . "/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT . "/includes/sidenav.php") ?>

<?php require_once(DOCUMENT_ROOT . "/php/DBHandler.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>


	<table id="problems_table" class="using-lib-with-stu">
    <thead>
			<tr>
				<th>Document Index</th>
				<th>Title</th>

			</tr>
		</thead>

		<tbody>

			<tr>
				<td>5.1</td>
				<td><a href="/landing-page/using-lib-with-stu/get-started-with-stu.php">Getting Started with your Students</a></td>
			</tr>

			<tr>
				<td>5.1.1</td>
				<td><a href="/background/get-started.php">How I got started</a></td>
			</tr>

			<tr>
				<td>5.2</td>
				<td><a href="/about/classroom.php">Stella in my Classroom</a></td>
			</tr>

			<tr>
				<td>5.2.1</td>
				<td><a href="/about/grading_slips_large.pdf" target="_blank">Grading Slip (large)</a></td>
			</tr>
			<tr>

			<tr>
				<td>5.2.2</td>
				<td><a href="/about/grading_slips_small.pdf" target="_blank">Grading Slip (small)</a></td>
			</tr>

			<tr>
				<td>5.2.3</td>
				<td>Grading Smaller Sets {set of numbers}</td>
			</tr>

      <tr>
				<td>5.3</td>
				<td><a href="/background/heuristics.php">Heuristics</a></td>
			</tr>

			<tr>
				<td>5.4</td>
				<td><a href="/about/extending.php">Extending Problems</a></td>
			</tr>
			<tr>

			<tr>
				<td>5.5</td>
				<td><a href="/landing-page/using-lib-with-stu/feedback.php">Feedback from Former Students</a></td>
			</tr>

			<tr>
				<td>5.6</td>
				<td><a href="/background/problem_solving.php">What Students Learn from Problem Solving</a></td>
			</tr>
		</tbody>
	</table>

</div>
<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>
