<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "Contact";
$pageName = "Contact";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<p>We would like to hear from you!  We welcome comments about the design of the website, in particular glitches/bugs that you find and suggestions to increase its user-friendliness.</p>

	<p>We welcome comments about the problems—everything from typographical errors, difficulty in creating documents, to sharing alternate solutions you may have found.</p>

	<p>We would like to hear about your students’ experiences in grappling with the Stellas.</p>

	<p>We would like to hear your reflections on your own teaching, any ways of your own that you’ve found about using the Stellas
	with your students, and how your perceptions of yourself as a teacher have evolved.</p>

	<p>Send any messages to me, Rudd Crawford, at <a href="mailto:ruddac@hotmail.com">ruddac@hotmail.com</a>. I’ll try to get back to you promptly.</p>

</div>


<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
