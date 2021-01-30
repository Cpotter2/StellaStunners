<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
?>

<?php
$title = "Bibliography";
$pageName = "Bibliography";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<table id="source_table">
	<?php
    $sources = file("sources.txt");
    $tableHead = array_shift($sources);
    echo "<thead><tr>";
    foreach (explode("\t", $tableHead) as $column) {
        echo "<th>$column</th>";
    }
    echo "</tr></thead>";
    echo "<tbody>";
    foreach ($sources as $line) {
        echo '<tr>';
        foreach (explode("\t", $line) as $datum) {
            echo "<td>$datum</td>";
        }
        echo '</tr>';
    }
    echo "</tbody>";
    ?>
	</table>

</div>

<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>


<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
