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

  <ol>
    <li>Find the problems you want to include, and write down their Stella index numbers.</li>
    <li>Go to Problems and Document Creation (up top); click on Document Creator.</li>
    <li>Type in the numbers with Add Problem after each. (If you want to remove a problem
that you added, click Remove Problem.)</li>
    <li>Make a title for the document you’re creating. Click Make Document (the box at the
bottom).</li>
  </ol>

  <p>Your browser will download a pdf.</p>

  <p><strong><u>Warning:</u></strong> If you leave the Create Documents page, what you have won’t be saved.  Thus if you add a problem and then want to go looking for another one, you’ll lose what
    you already have.  That’s why you need to assemble the list of what you want and type them in all at one time.</p>

  <p><strong><u>Note:</u></strong>You can't get a problem's solution into its document. If you want a pdf of a solution, take a screen shot.</p>

  <p><strong><u>Note:</u></strong> The crew is working on a way of getting those numbers in smoothly so you don’t have to write them down.</p>


</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
