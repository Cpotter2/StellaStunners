<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");
?>

<?php
$title = "Getting Problems";
$pageName = "Getting some Problems for your Students Quickly";
include_once(DOCUMENT_ROOT . "/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT . "/includes/sidenav.php") ?>

<?php require_once(DOCUMENT_ROOT . "/php/DBHandler.php") ?>

<div id="content">
  <h1><?php echo $pageName ?></h1>

  <ol>
    <li>On the "Problem Sets" menu on the left, click on <b>Filter</b> and choose one of the first
    five tags on the drop-down menu. These correspond to particular courses.</li>
    <li>Click <b>Add Tag</b>.</li>
    <li>Choose a <b>Problem Set</b>. Each set contains a variety of problems, which become
    more challenging as the set number increases.</li>
    <li>Click on the red box: "Create a document with these problems".</li>
    <li>Write a <b>title</b> for your set in the box at the top. Click "Make Document" (the box at
    the bottom).</li>
  </ol>
  
  <p>Your browser will download a pdf.</p>

  <p>N.b., if you're just getting started using non-routine problems with your students, we
  strongly suggest that you read the advices in the essay "Getting Started with your
  Students" first—it's in the USING post-it.</p>

  <p>For more flexibility in making a problem set, see the links in the BROWSING post-it.</p>

</div>

<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>
