<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php require_once(DOCUMENT_ROOT."/php/DBHandler.php") ?>

<?php // Login validation
$error = ""; // Message to send to client on failure
session_start();
$handle = new Admin(); // Connect to database of user accounts

if (isset($_POST['user']) and isset($_POST['pass'])) {
	$result = $handle->query("SELECT username, password FROM users WHERE username='$_POST[user]'");
	// Check if not accounts exists with specified username
	if ($result->num_rows === 0) {
		$error = "Invalid username or password";
	} else {
		// If username exists, grab password hash and check against the hash of user's input
		$account = $result->fetch_assoc();
		if (hash("sha256", $_POST['pass']) == $account['password']) {
			// On success, set SESSION user variable and redirect to editor/index.php
			$_SESSION['user'] = $account['username'];
			redirect("/problems/editor");
		} else { $error = "Invalid username or password"; }
	}
}

// Close database connection
$handle->close();
?>

<?php
$title = "Administrators Login";
$pageName = "Administrators &ndash; Login";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>


<div id="content">
	<h1><?= $pageName ?></h1>

	<form action="" id="loginForm" method="post">
		<table>
		<tr>
			<td class="fieldName">Username:</td>
			<td><input type="text" name="user"></td>
		</tr>
		<tr>
			<td class="fieldName">Password:</td>
			<td><input type="password" name="pass"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Login"></td>
		</tr>
		</table>
	</form>

	<?= $error ?>

</div>
<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>

