<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "THE PROBLEM LIBRARY";
$pageName = "Guided Tour";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>


<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

  <p>A Quick Guided Tour of the Website</p>

  <p>Stella problems are coded with index numbers, like this: <strong>2860.51 – Robot Stones</strong></p>

  <p>The 2000 part of the number tells us that it’s an algebra problem.  The 860 is the subcategory within algebra (see below).  And the two-place decimal completes
    the problem’s very own index number.  This problem seems to be something about robots, and something about stones. Hmm.</p>

  <p>The Stella problem library is like a library of books. The Stella Decimal System is like the Dewey Decimal System.  The Stella Decimal System (SDS) has thirteen over-arching
		 categories, which you can see <a href="/stella_system/topic_overview.php">here</a> .  One of those categories is algebra, 2000.  The list of subcategories is <a href="/stella_system/topic.php">here</a>
		 (listed alphabetically) and <a href="/stella_system/stella_num.php">here</a> (in numerical order).  The number 860 tells us that the problem involves arithmetic sequences.  [These links are not yet live, in spite of the blue.]  There are three hundred and fifty of these subcategories, spread amongst the thirteen overarching categories. </p>

  <p>The button at the top of the home page will give you the complete list of the 706 (and counting) problems.  Control F will open a search box at the bottom of the page where
    you can type in a subcategory number to see what’s there.  (Uh-oh: some subcategories don’t have problems (yet).)</p>

  <p>On the left side of the home page you see a dark panel entitled Problem Sets.  These are sets of problems that we think you might find handy for use with your students.
    There are 18 such problem sets, basically one for every two weeks, on average, of the usual school year. </p>

  <p>Within each problem set are five subsets of 6 to 8 problems, that you can use for five different courses: pre-algebra, algebra I, geometry, algebra II/trig,
    and pre-calculus--"advanced"--math.</p>

  <p>Each of these small sets of problems starts with an “easy” visual problem—a grabber, if you will.  Then comes something involving numbers, then algebra, on up to a rough guess about what the particular course might be studying at that point.  We did our best about this.  For instance, the geometry problems in set 9 (halfway through the year) end with a problem that we think would be a review problem, and with a problem related, maybe, to what’s currently being studied.  As I said, these are a rough guess. </p>

  <p>The material in “Browsing, Finding, and Downloading” will show you how to make these subsets.</p>

  <p>So a quick way to get problems ready for your class is to go to whichever problem set, 1 to 18, you're ready for, filter out the problems for your class, and print them out (as a PDF).  The browsing button will show you how to do that.

  <p>Going further, if you want to edit the set, you can browse around and find something that’s a better fit for what you want.  The browsing button will show you how.</p>

  <p>By the way, there are no problems that appear in more than one problem set.  You could give your students Stellas for five years, using the problem sets, and they would never see the same problem twice!  (But, thus, if you edit a problem set and stick in something else, you might find it turning up in another set later. The green tags that you’ll see with the problems will tip you off about this. Be ye warned.)</p>

  <p>Each problem comes with three green tags, indicating the set that it’s in, the course that it’s in, and what kind of a problem it is (among the 13 overall topics).</p>

  <p>The introductory problems are discussed under the browsing button. The discussion is all about . . . wait for it . . . heuristics.</p>

  <p>Finally, about set 99.  These are problems that aren't in any of the 18 official problem sets.  This is where we add more problems that we find. If you send us nifty problems of your own to add to the library (hint, hint), this is where they'll go.</p>

</div>

<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
