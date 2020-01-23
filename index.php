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
<h1 class="introduction"><span class="description">Stella's Stunners:</span> Non-Routine Mathematics Problems for Middle and High School Students.</h1>
	<ul class="sticky-notes">
		<li class="sticky-notes">
			<a href="/landing-page/welcome">
				<h2 class="sticky-fonts welcome"> WELCOME</h2>
			</a>
		</li>
		<li class="sticky-notes">
			<a href="/landing-page/play">
				<h2 class="sticky-fonts play">PLAY</h2>
			</a>
		</li>
		<li class="sticky-notes">
			<a href="/landing-page/the-prob-library">
				<h2 class="sticky-fonts lib-prob">THE PROBLEM LIBRARY</h2>
			</a>
		</li>
		<li class="sticky-notes">
			<a href="/landing-page/nav-in-library">
				<h2 class="sticky-fonts nav-lib">NAVIGATING IN THE LIBRARY</h2>
			</a>
		</li>
		<li class="sticky-notes">
			<a href="/landing-page/using-lib-with-stu">
				<h2 class="sticky-fonts stu">USING THE LIBRARY WITH STUDENTS</h2>
			</a>
		</li>
		<li class="sticky-notes">
			<a href="/landing-page/everything-else">
				<h2 class="sticky-fonts everything-else">EVERYTHING ELSE</h2>
			</a>
		</li>
	</ul>


</div>



<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>
