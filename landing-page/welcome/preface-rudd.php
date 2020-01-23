<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");
?>

<?php
$title = "WELCOME";
$pageName = "Preface";
include_once(DOCUMENT_ROOT . "/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT . "/includes/sidenav.php") ?>

<?php require_once(DOCUMENT_ROOT . "/php/DBHandler.php") ?>

<div id="content">
  <h1><?php echo $pageName ?></h1>
  <h4>by Rudd Crawford</h4>

  <p>Here, for you, is an ever-growing library of non-routine mathematical challenge problems, collected by me (Rudd), my great and late friend Stella, and others,
    over a span of more than fifty years. The problems, numbering over seven hundred so far, range from simple visual problems that require no specific mathematical background,
    to problems that use the content of Pre-Algebra, Algebra, Geometry, and Trigonometry, up into the foothills of calculus.</p>

  <p>We in the Stella Project have tried to design the website to maximize its usefulness and its ease of use. It’s worth taking some time to visit the two sections, The Problem Library and Browsing, Finding, and Downloading, before dealing with the
    specific material in Using the Library with Students.
    A personal note: Nearly all of the ancillary materials—essays, guidelines, instructions--were written by me. You’ll note that I used first person most of the time. I couldn’t help it, since I was writing about things I did and things I learned. I
    hope that the first-person writing won’t get in the way of what I’m trying to say. It’s not supposed to be about me, but rather about you and what you can do for your students.
    If you’re new here, you can start by playing around with some problems just for fun. Welcome to the Stella world.</p>

</div>

<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>
