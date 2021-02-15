<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "NAVIGATING IN THE LIBRARY";
$pageName = "Finding a Problem by Topic";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>


<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

  <p>Go to "Problems and Document Creation" (up top) and use your search engine to open
a window at the bottom of your screen. If you want a problem about logarithms, type
that into the box and you’ll see one. Scroll up and down to search for all that there are.
Typing "logs" will find you a few more. </p>

<p>However, this method will find only problems that have "logarithms" in the title of the
problem. If a problem involves logarithms but they're not mentioned in the title, you
won't find it. There is an advantage to this: if a student will need to realize, in working
on a problem, that using logs will be helpful, realizing that is probably an important thing
for them to do; thus we shouldn't give that away in the title.</p>

</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
