<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php // Check if a user is logged in
session_start();

if (!isset($_SESSION['user'])) { // Die if not logged in
	die();
}
?>

<?php require_once(DOCUMENT_ROOT."/php/DBHandler.php") ?>

<?php // Application Logic

$handle = new Editor();
$id = $handle->realEscapeString($_POST['problemID']);
$title = $handle->realEscapeString($_POST['title']);
$probText = $handle->realEscapeString($_POST['probText']);
$solText = $handle->realEscapeString($_POST['solText']);
$probImageSize = $handle->realEscapeString($_POST['probImageSize']);

$response = array();

if (!$problem = $handle->getProblem($id)) {
	$response['success'] = False;
	$response['message'] = "Could not find problem $id";
	die(json_encode($response));
}

if ($_POST["probImageAction"] != 0) { // Then we are deleting/adding an image
	$probImage = 0; // If we're replacing/adding an image, then we'll set this back to 1
	foreach (glob(DOCUMENT_ROOT."/images/stunners/$id/pfig*") as $img) { unlink($img); }
	if (($_POST["probImageAction"] == 1) and ($_FILES['probImage']['error'] != UPLOAD_ERR_NO_FILE)) {
		if (!file_exists(DOCUMENT_ROOT."/images/stunners/$id")) {
			mkdir(DOCUMENT_ROOT."/images/stunners/$id");
		}
		$probImage = 1;
		$imageFileType = strtolower(pathinfo($_FILES['probImage']['name'], PATHINFO_EXTENSION));
		move_uploaded_file($_FILES['probImage']['tmp_name'], DOCUMENT_ROOT."/images/stunners/".$id."/pfig1.".$imageFileType);
	}
} else {
	$probImage = $problem->getProbImg();
}

if ($_POST["solImageAction"] != 0) { // Then we are deleting/replacing an image
	$solImage = 0;
	foreach (glob(DOCUMENT_ROOT."/images/stunners/$id/sfig*") as $img) { unlink($img); }
	if (($_POST["solImageAction"] == 1) and ($_FILES['solImage']['error'] != UPLOAD_ERR_NO_FILE)) {
		if (!file_exists(DOCUMENT_ROOT."/images/stunners/$id")) {
			mkdir(DOCUMENT_ROOT."/images/stunners/$id");
		}
		$solImage = 1;
		$imageFileType = strtolower(pathinfo($_FILES['solImage']['name'], PATHINFO_EXTENSION));
		move_uploaded_file($_FILES['solImage']['tmp_name'], DOCUMENT_ROOT."/images/stunners/".$id."/sfig1.".$imageFileType);
	}
} else {
	$solImage = $problem->getSolImg();
}

// Change tags

// Adding new tags: Iterate through all the tags. If a tag is set in
// $_POST, but not already in the problem's tags, then we need to add a tag
foreach ($handle->getTagNames() as $tagName) {
	if (isset($_POST[$tagName])) {
		if (!in_array($tagName, $problem->getTags())) {
			$tagID = $handle->getTagByName($tagName)->getID();
			$handle->query("INSERT into tagmap (problem_id, tag_id) VALUES ('$id', $tagID)");
		}
	}
}

// Deleting tags: Iterate though the problem's tags. If a tag is not set in
// $_POST, then the tag should be removed
foreach ($problem->getTags() as $tagName) {
	if (!isset($_POST[$tagName])) {
		$tagID = $handle->getTagByName($tagName)->getID();
		$handle->query("DELETE from tagmap WHERE problem_id = '$id' AND tag_id = $tagID");
	}
}

//$queryString = "UPDATE problems SET title = '$title' where id = '$id'";
$probImageSize = $probImageSize ? $probImageSize : 'NULL';
$queryString = "UPDATE problems SET title = '$title', probtext = '$probText', probimage = $probImage, probimagesize = $probImageSize, soltext = '$solText', solimage = $solImage WHERE id = '$id'";
	
if (!$id) {
	$reponseToClient = "No Stella number specified";
} else {
	if ($handle->query($queryString)) {
		$response['success'] = True;
		$response['message'] = "Problem $id successfully edited";
	} else {
		$response['success'] = False;
		$response['message'] = "Error: {$handle->error()}";
	}
}

echo json_encode($response);

?>

