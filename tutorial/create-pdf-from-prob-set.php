<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "NAVIGATING IN THE LIBRARY";
$pageName = "Printing problems from a problem set";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>


<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<p>Suppose you want to get the algebra problems from Set 3 onto your desktop (in a PDF).</p>

	<p>1. Go to Problems</p>

	<p>2. In the problem set bar on the left, click on filter.</p>

	<p>3. Click on Algebra</p>

	<p>4. Click on Add Tag</p>

	<p>5. Click on Set 3.</p>

	<p>Your problems will be there.  There will be a red-bordered box saying Create a Document with these problems.</p>

	<p>6. Click on that box.</p>

	<p>7. Make a title for your document (presumably Set 1 Algebra, or the like).</p>

	<p>8. Click on Make Document.</p>

	<p>9. In the window that opens, click OK.</p>

	<p>10. In the next window, click Save (assuming you want it on your desktop).</p>

	<p>11. It will indeed be on your desktop. It won’t be saved inside the website.</p>

</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
