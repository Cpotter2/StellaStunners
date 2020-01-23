<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "NAVIGATING IN THE LIBRARY";
$pageName = "Find a Problem by Topic";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>


<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

  <p>Go to Problems and use Control F to open a window at the bottom of your screen.  If you want a problem about logarithms, type that into the box and you’ll see one.
    Scroll up and down (arrows by the little box) to find them all.  If you typed “logs” it’ll pop up too.</p>

  <p>If you type in “complex numbers” you won’t get anything because there aren’t any problems about complex numbers in the library (yet).
    Try “imaginary” and you’ll get something.  (And if you have a nifty problem about complex numbers that you like, send it to us!).</p>

  <p>If you want to find problems involving right triangles, typing in “right” will give you only a couple of them.  There are lots of problems in the library that involve
    right triangles, for sure, but unless “right” or “right triangle” is named in the <u>title</u> of the problem you won’t find it by this search.  This is partly because in some
    problems the whole trick is to realize that you need to discover that a right triangle is what you need to solve it.  Mustn’t give it away . . .</p>

  <p>If you’ve browsed around in the topic list and you see a topic that looks interesting you can type it into the search box by its number or by its name to see what’s there.</p>

</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
