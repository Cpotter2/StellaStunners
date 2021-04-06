<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "NAVIGATING IN THE LIBRARY";
$pageName = "Create a PDF of One Problem";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>


<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

  <p>Find a problem that you want to have on your desktop.</p>

  <p>1. Open it up and note its number (either write it down or put it on your clipboard—or just remember it).</p>

  <p>2. Go to Document Create.</p>

  <p>3. Go to Problems and click on Document Creator.</p>

  <p>4. On that page type in the problem number at “Stella Index” and click “add problem”.
Make a title for the document you’re creating.</p>

  <p>5. Click Make  Document, then click on Open (“save file”).</p>

  <p>6. Save it to your desktop—it’ll be a PDF.</p>

  <p>If you’d rather use the problem’s title than use its index number, you can do that.  (The title is maybe easier to remember.)</p>

  <p><strong><u>Note:</u></strong> You can’t get a problem’s solution into its document.</p>

  <p><strong><u>Warning:</u></strong> If you leave the Create Documents page, what you have won’t be saved. There are separate instructions
    for creating a document of several problems.</p>

</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
