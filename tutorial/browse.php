<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "NAVIGATING IN THE LIBRARY";
$pageName = "Browse";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>


<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

  <p>Go to Problems and Document Creation (up top) and observe the list.  Scroll up and down and click on any problem that looks interesting (click on its number).
    Click on the solution. Do it a few more times. If you know a particular problem number or problem title you want to find, you can use Control F to find it
    (it opens a box at the bottom of the page). Here are two samples to try: 3470.61 and duck.</p>

</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
