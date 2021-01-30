<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "Acknowledgements";
$pageName = "Acknowledgements";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<p>This project would not have been possible without the extraordinarily energetic and creative efforts of Oberlin College </p>

	<p>students. In early 2018, Aiden Kidder-Wolff, Ben McGarvey, Khang Nguyen, Zach Novick, and Nick Wilcox began the </p>

	<p>construction of the website itself. Further work has been done by Jeremiah Slack-Welles, Colton Potter, and Felix Pham.</p>

	<p>Preparation of the problems was undertaken by Rachael Branscomb, James Dryden, Harry Mayrhofer, Isabella Spanos, and</p>

	<p>retired Professor of Mathematics Michael Henle, each of whom updated particular problems and added highly creative</p>

	<p>touches. Michael has been the one in charge of the graphics associated with the problems. Also to be thanked for their</p>

  <p>support are Professors Robert Geitz and Jack Calcut, of the Computer Science and Mathematics Departments respectively.</p>

	<p>Jackie Fortino, Secretary of the CS Department, provided strong assistance as needed.  Dr. Chris Mohler provided much</p>

	<p>technical assistance from the College's Center for Information Technology. Steve Meiring, retired mathematics</p>

	<p>specialist for the Ohio State Department of Education is, due fulsome thanks for his numerous behind-the-scenes</p>

	<p>consultations and the foreword he wrote. Finally, thanks are due to Oberlin College itself for providing the well-equipped</p>

	<p>spaces within which the work could be done and for housing the website itself.</p>

	<ul>
	<li class="signature">--Rudd Crawford</li>
	</ul>

</div>


<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
