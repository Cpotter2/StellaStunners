<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "NAVIGATING IN THE LIBRARY";
$pageName = "Browsing by Number or Title";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>


<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

  <p>Go to Problems and Document Creation (up top) and observe the list.  Scroll up and down and click on any problem that looks interesting (click on its number).
    The problem appears, and you can click to see the solution. If you happen to know a particular problem number or problem title you want to find, you can use your browser's search engine to find it. Here are two samples to try: 3470.61 and duck.</p>

</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
