<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "NAVIGATING IN THE LIBRARY";
$pageName = "Creating a PDF of One Problem";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>


<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

  <p>Find a problem that you want to have on your desktop.</p>

  <ol>
    <li>Find a problem that you want to have on your desktop. Note its number or title
(either write it down or put it on your clipboard—or just remember it).</li>
    <li>Go to Problems and Document Creation; click on Document Creator.</li>
    <li>On that page type in the problem number or title at "Stella Index" and click "add
problem".</li>
    <li>Make a title for the document you’re creating. Click Make Document (the box at the
bottom).</li>
  </ol>

  <p>Your browser will download a pdf.</p>

  <p><strong><u>Note:</u></strong> You can’t get a problem’s solution into its document. If you want a pdf of a solution, take a screen shot.</p>

  <p>There are separate instructions for creating a document of several problems.</p>

</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
