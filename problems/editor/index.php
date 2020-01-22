<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
session_start();

if (!isset($_SESSION['user'])) {
	redirect("/problems/editor/login.php");
}
?>

<?php
$title = "Problem Editor";
$pageName = "Problem Editor";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<script src="editor.js"></script>


<div id="content">
<h1><?php echo $pageName ?></h1>


<button type="button" id="resetButton">Back to Editor</button>

<!-- Form to change or delete existing problems -->
<div class="editorFormWrapper">

<!-- Title element, which has the click event attached to it -->
<h2>Edit an existing problem</h2>

<!-- Particular to this form, grab data from problems in the database
     to populate the form -->
<span id="problemSelector">
	Enter Stella Number: <input type="text" id="getProblemID">
	<button type="button" id="grabProblemButton">Edit Problem</button>
</span>

<!-- Here's the form -->
<form id="editProblemForm" class="editorForm" action="" method="post">
	<input type="hidden" name="problemID" value="">
	<input type="hidden" name="originalProbImage" value="">
	<input type="hidden" name="originalSolImage" value="">
	<table>
	<tr>
		<!-- Not actually input because the problem was already selected -->
		<td class="fieldName">Stella Number:</td>
		<td class="fieldValue" id="problemIDLabel"></td>
	</tr>
	<tr>
		<td class="fieldName">Problem Title:</td>
		<td class="fieldValue"><input type="text" name="title"></td>
	</tr>
	<tr>
		<td style="vertical-align: top;" class="fieldName">Problem Text:</td>
		<td class="fieldValue"><textarea name="probText"></textarea></td>
	</tr>
	<tr>
		<td class="fieldName">Problem Image:</td>
		<td class="fieldValue">
		<input type="hidden" name="probImageAction" class="imageAction" value="0">
		<input type="file" id="editProbImageSelect" name="probImage" class="imageInput">
		<input type="button" class="selectImageButton" value="Select Image">
		<span id="editProbImageLabel"></span>
		<br><input type="button" class="removeImageButton" value="Remove Image"></td>
	</tr>
	<tr>
		<td class="fieldName">Problem Image Size:</td>
		<td class="fieldValue"><input type="text" name="probImageSize" placeholder="Enter w (0 < w <= 1)"/></td>
	</tr>
	<tr>
		<td style="vertical-align: top;" class="fieldName">Solution Text:</td>
		<td class="fieldValue"><textarea name="solText"></textarea></td>
	</tr>
	<tr>
		<td class="fieldName">Solution Image:</td>
		<td class="fieldValue">
		<input type="hidden" name="solImageAction" class="imageAction" value="0">
		<input type="file" name="solImage" class="imageInput">
		<input type="button" class="selectImageButton" value="Select Image">
		<span id="editSolImageLabel"></span>
		<br><input type="button" class="removeImageButton" value="Remove Image"></td>
	</tr>
	<!-- Tag Selection Table -->
	<tr></td>
		<td></td>
		<td><table class="tagTable">
			<tr>
			<th colspan="3">Tags</th>
		</tr>
		<tr>""
			<th class="tagType">Problem Set</th>
			<th class="tagType">Course</th>
			<th class="tagType">Topics</th>
		</tr>
		<tr>
			<td>
			<?php
			echo "<input type=\"checkbox\" name=\"Introductory\" value=\"1\">Introductory<br>\n";
			for ($i = 1; $i <= 18; $i++) {
			      echo "<input type=\"checkbox\" name=\"set$i\" value=\"1\">Set $i<br>\n";
			}
			echo "<input type=\"checkbox\" name=\"set99\" value=\"1\">Set 99<br>\n";
			?>
			</td>
			<td>
			<?php foreach (array("PreAlg", "AlgI", "Geom", "Alg/Trig", "PCM") as $course) {
				echo "<input type=\"checkbox\" name=\"$course\" value=\"1\">$course<br>\n";
			}?>
			</td>
			<td>
			<?php foreach (array("Visual", "Logic", "ArithZ", "ArithQ&R", "Alg-Prep", "Algebra", "Symbol-Pushing", "Geom-Informal", "Geom-Eucl", "Geom-Analyt", "Trig", "Pre-Calc", "Calculator") as $topic) {
				echo "<input type=\"checkbox\" name=\"$topic\" value=\"1\">$topic<br>\n";
			}?>
			</td>
		</tr>
		</table></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Submit Changes"></td>
	</tr>
	<tr>
		<td></td>
		<td><button type="button" class="clearFormButton">Clear Form</button></td>
	</tr>
	</table>
</form>


<button type="button" class="previewButton">Preview</button>
<div class="previewWrapper">

</div>

</div>

<!-- Add Problem Form -->
<div class="editorFormWrapper" id="addProblem">
<h2>Add a new problem</h2>
<form class="editorForm" id="addProblemForm"  method="post" enctype="multipart/form-data">
	<table>
	<tr>
		<td class="fieldName">Stella Number:</td>
		<td class="fieldValue"><input type="text" name="problemID"></td>
	</tr>
	<tr>
		<td class="fieldName">Problem Title:</td>
		<td class="fieldValue"><input type="text" name="title"></td>
	</tr>
	<tr>
		<td style="vertical-align: top;" class="fieldName">Problem Text:</td>
		<td class="fieldValue"><textarea name="probText"></textarea></td>
	</tr>
	<tr>
		<td class="fieldName">Problem Image:</td>
		<td class="fieldValue">
		<input type="file" name="probImage" class="imageInput">
		<input type="button" class="selectImageButton" value="Select Image">
		<span id="addProbImageLabel">No image</span>
		<br><input type="button" class="removeImageButton" value="Remove Image"></td>
	</tr>
	<tr>
		<td style="vertical-align: top;" class="fieldName">Solution Text:</td>
		<td class="fieldValue"><textarea name="solText"></textarea></td>
	</tr>
	<tr>
		<td class="fieldName">Solution Image:</td>
		<td class="fieldValue">
		<input type="file" name="solImage" class="imageInput">
		<input type="button" class="selectImageButton" value="Select Image">
		<span id="addSolImageLabel">No image</span>
		<br><input type="button" class="removeImageButton" value="Remove Image"></td>
	</tr>
	<!-- Tag Selection Table -->
	<tr></td>
		<td></td>
		<td><table class="tagTable">
		<tr>
			<th colspan="3">Tags</th>
		</tr>
		<tr>
			<th class="tagType">Problem Set</th>
			<th class="tagType">Course</th>
			<th class="tagType">Topics</th>
		</tr>
		<tr>
			<td>
			<?php
			echo "<input type=\"checkbox\" name=\Introductory\" value=\"1\">Introductory<br>\n";
			for ($i = 1; $i <= 18; $i++) {
				echo "<input type=\"checkbox\" name=\"set$i\" value=\"1\">Set $i<br>\n";
			}
			echo "<input type=\"checkbox\" name=\"set99\" value=\"1\">Set 99<br>\n";
			?>
			</td>
			<td>
			<?php foreach (array("PreAlg", "AlgI", "Geom", "Alg/Trig", "PCM") as $course) {
				echo "<input type=\"checkbox\" name=\"$course\" value=\"1\">$course<br>\n";
			}?>
			</td>
			<td>
			<?php foreach (array("Visual", "Logic", "ArithZ", "ArithQ&R", "Alg-Prep", "Algebra", "Symbol-Pushing", "Geom-Informal", "Geom-Eucl", "Geom-Analyt", "Trig", "Pre-Calc", "Calculator") as $topic) {
				echo "<input type=\"checkbox\" name=\"$topic\" value=\"1\">$topic<br>\n";
			}?>
			</td>
		</tr>
		</table></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Submit"></td>
	</tr>
	<tr>
		<td></td>
		<td><button type="button" class="clearFormButton">Clear Form</button></td>
	</tr>
	</table>
</form>
<button type="button" class="previewButton">Preview</button>
<div class="previewWrapper">

</div>
</div>


<div class="editorFormWrapper" id="deleteProblem">
<h2>Delete a problem</h2>
<span id="problemSelector">
	Enter Stella Number: <input type="text" id="deleteProblemID">
	<button type="button" id="deleteProblemButton">Delete Problem</button>
</span>
</div>


	
</div>	
<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>

