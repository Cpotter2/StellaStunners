<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
include_once(DOCUMENT_ROOT."/php/DBHandler.php");



// This is the data from the checkout page
$problemSet = json_decode(file_get_contents('php://input'), true);


// Show error reports
//showErrors();

// Load FPDF and FPDI
use setasign\Fpdi\Fpdi;
require_once(DOCUMENT_ROOT.'/php/fpdf/fpdf.php');
require_once(DOCUMENT_ROOT.'/php/fpdi2/src/autoload.php');

// LaTeX handler
require_once(DOCUMENT_ROOT.'/php/LatexDoc.php');
?>

<?php // Document creation script

// Sends the PDF file after it's been created
function sendPDF($fileName) {
	global $problemSet;
	$pdf = new FPDI();
	$pageCount = $pdf->setSourceFile($fileName);

	// Import a page at a time.
	for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
		$tplIdx = $pdf->importPage($pageNo);

		// add a page
		$pdf->AddPage();
		$pdf->useTemplate($tplIdx);
	}

	$pdf->SetTitle($problemSet['title']);
	$pdf->Output('I', $problemSet['title'].'.pdf', true);

}

// Connent to database
//$conn = new mysqli($hn, $un, $pw, $db);

// Catch error
//if($conn->connect_error){ die($conn->connect_error);}else{ }

// Go ahead and close for testing
//conn->close();

$handle = new Stella();

// Make temp directory
$tempDir = tempdir('stella-');

try {
	$texDoc = new LatexDoc($tempDir);
	

	// Set title information based on form input
	$texDoc->setTitle($problemSet['title']);
	// $texDoc->setDate(date('l, F j, Y, H:i:s')); // Should probably change this later

	// These packages should be in everything we make.
	$texDoc->usePackage('inputenc', 'utf8'); // UTF-8 encoding
	$texDoc->usePackage('fullpage'); // gives us 1 in. margins on the PDF.
	$texDoc->usePackage('pdf14'); // makes the output PDF version 1.4, which is the highest version
				      // that the (free versions of) FPDF and FPDI libraries can handle.
	$texDoc->usePackage('graphicx'); // lets us embed images.

	// Load all the problems from the form
	// The argument to addProblem should be the index of the problem,
	// so this assumes what will be sent from checkout.php 
	foreach ($problemSet['problems'] as $problemID) {
		$texDoc->addProblem($problem = $handle->getProblem($problemID));
	}

	// Make the .tex file, compile it, and send on success.
	$texDoc->makeTexFile();
	if ($texDoc->compile()) { sendPDF($texDoc->pdfFileName); }

} finally {
	deleteDir($tempDir); // cleanup temp directory.
	$handle->close();
}



?>


