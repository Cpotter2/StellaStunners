<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "NAVIGATING IN THE LIBRARY";
$pageName = "Creating a PDF of a Set of Problems from Scratch";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>


<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

  <p>Suppose you are starting the year with your geometry class, and you want to find out what we suggest for a geometry class in set one.  Do these steps in order:</p>

  <p>1. Write down their Stella index numbers.</p>

  <p>2. Go to Document Create.</p>

  <p>3. Type in the numbers with Add Problem after each.</p>

  <p>If you want to remove a problem that you added, click Remove Problem.</p>

  <p>Proceed as in the previous posting (<a href="/tutorial/create-pdf-from-prob-set.php" target="_blank">Create a PDF from a Problem Set</a>).</p>

  <p><strong><u>Warning:</u></strong> If you leave the Create Documents page, what you have won’t be saved.  Thus if you add a problem and then want to go looking for another one, you’ll lose what
    you already have.  That’s why you need to assemble the list of what you want and type them in all at one time.</p>

  <p><strong><u>Note:</u></strong> The crew is working on a way of getting those numbers in smoothly so you don’t have to write them down.</p>


</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
