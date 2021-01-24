<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT . "/php/constants.php");
include_once(DOCUMENT_ROOT . "/php/functions.php");
?>

<?php
$title = "WELCOME";
$pageName = "Welcome";
include_once(DOCUMENT_ROOT . "/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT . "/includes/sidenav.php") ?>

<?php require_once(DOCUMENT_ROOT . "/php/DBHandler.php") ?>

<div id="content">
  <h1><?php echo $pageName ?></h1>

  <p>Welcome to a library of more than 700 non-routine mathematics problems, arranged for
easy access by topic, with numerous suggestions for using them with students. Within
this WELCOME post-it are two start-up links, one for getting a handful of problems
available for your students very quickly, and the other for taking a brief look at the
organization of problem library itself. Steve Meiring's Foreward lays out the website for
you in detail and explains the rationale for its existence. And for an immediate taste of
the flavor of the Stella problems, go to the PLAY post-it and have some fun.</p>

</div>

<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>
