<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");
?>

<?php
$title = "Home";
$pageName = "Stella's Stunners";
include_once(DOCUMENT_ROOT . "/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT . "/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>
	<h3>Welcome to the library of Stella's Stunners.</h3>

	<p> Oberlin College welcomes you to an ever-growing library of non-routine mathematical challenge problems, collected by schoolteacher Rudd Crawford, with help, for more than 50 years. The problems, numbering over 600 so far, range from simple visual problems that require no specific mathematical background, to problems that use the content of Pre-Algebra, Algebra I, Geometry, Algebra II and/or Trigonometry, up into the foothills of calculus.</p>

	<p>The Stella problems are not typical textbook exercises. They are considered "non-routine" problems because the methods of attacking them are not immediately obvious. Indeed, the immediate response from students is, typically, "Wait! Are you kidding me? No way!" Because these problems can supplement and enliven traditional mathematics courses in a variety of ways, we have included materials to assist you in using Stella problems in your teaching. This home page gives links to these materials.</p>

	<ul>
		<!--comment out the link for backgroud, as links for  the same articles are provided in the following sentences-->
		<li>
			<!--<a href="background">-->Background essays</a></li>
		<ul>
			<li><a href="background/problem_solving.php">What students gain from problem solving</a></li>
			<li><a href="background/heuristics.php">Some helpful problem solving heuristics</a></li>
			<li><a href="background/bio.php">Stella biography</a></li>
		</ul>
		<li>Introductory problems with detailed solutions</li>
		<ul>
			<li><a href="intro/intro_essay.php">Intro essay</a></li>
			<li>Problems and solutions</li>
		</ul>
		<li>Problem sets: 18 sets for 5 courses</li>
		<li>Making your own problem sets: the shopping cart</li>
		<li><a href="about">Using Stella Problems</a></li>
		<ul>
			<li><a href="about/classroom.php">In the classroom</a></li>
			<li>Sample grading slips, <a href="about/grading_slips_small.pdf" target="_blank">small</a> and <a href="about/grading_slips_large.pdf" target="_blank">large</a></li>
			<li><a href="about/extending.php">On extending problems</a></li>
		</ul>
		<li>The complete Stella Library</li>
		<ul>
			<li>By course</li>
			<li>By title</li>
			<li>By Stella number</li>
			<li>By tags</li>
		</ul>
		<li>The Stella Decimal System</li>
		<ul>
			<li><a href="stella_system/stella_num.php">By Stella number</a></li>
			<li><a href="stella_system/topic.php">By topic</a></li>
			<li><a href="stella_system/topic_overview.php">Topic overview</a></li>
		</ul>
		<li><a href="copyright">Sources</a></li>
		<li>How to contact us</li>
		<li>How to suggest problems for inclusion in the library</li>
	</ul>


</div>



<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>