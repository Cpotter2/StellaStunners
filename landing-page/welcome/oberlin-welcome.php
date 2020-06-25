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

  <p>Oberlin College welcomes you to a library of more than 700 non-routine mathematics problems, arranged for easy access by topic, 
  with numerous suggestions for using them with students. Spend some behind the “Play” post-it and go on from there.</p>

</div>

<?php include(DOCUMENT_ROOT . "/includes/footer.php") ?>
