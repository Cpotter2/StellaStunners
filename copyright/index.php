<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
include_once DOCUMENT_ROOT."/php/login.php";
?>

<?php
$title = "Sources";
$pageName = "Sources";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<div id="content">
	<h1><?php echo $pageName ?></h1>

	<h3>A note on sources</h3>
	<p>Here’s how I’ve handled sources and citations (Rudd writing): As I accumulated problems from various sources over the years, I wrote them on filing cards
		and was sloppy about keeping track of where I found them. Some problems are simply generic,like the basic recipes in a cookbook.
		But many, especially the kind I’ve liked to collect, deserve citation.
		So now, in setting up this website, I have searched back and found sources for as many such problems as I could. </p>

	<p>In going through the problem collection, I grouped the problems as follows:</p>

	<p><u>Problems needing a footnote:</u></p>

	<p>1.  Problems taken word for word, or a copied diagram exactly; source given accurately.  There are about 150 of these.</p>

	<p>2.  Problems taken word for word, or a copied diagram exactly; source not found (groan).  There are 32 or so of these, alas.  These are the ones I'm unhappy about.</p>

	<p>3.  Problems with a cool idea, that my crew has rewritten for local/timely/fun reasons; good spirit to credit the source but not legally required, I'm sure.</p>

	<p><u>Problems that I think don’t need a footnote:</u></p>

	<p>4.  Problems with a cool idea that have appeared in many sources.</p>

	<p>5.  Problems from old AHSME’s.</p>

	<p>6. Problems that are just straight math things--no particular flavor; no need to cite (anybody could have thought them up; maybe Stella or I did).</p>

	<p>Perhaps the most-used single source is the massive collection of problems given out at "a conference on computers in secondary-school mathematics,
		June 22-27, 1986", at Phillips Exeter Academy.  There is a tremendous number of interesting problems in this collection.
		There is no copyright for the entire document, and there is no citation for any problem.  Thus I don't think we're required to cite these problems,
		but the Exeter folks certainly deserve a shout-out for creating/compiling them.</p>

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
