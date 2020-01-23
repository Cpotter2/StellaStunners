<?php
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
include_once(DOCUMENT_ROOT."/php/constants.php");
include_once(DOCUMENT_ROOT."/php/functions.php");
include_once DOCUMENT_ROOT."/php/login.php";
?>

<?php
$title="Topic Overview";
$pageName="Topic Overview";
include_once(DOCUMENT_ROOT."/includes/header.php");
?>

<div id="content">
  <h1><?php echo $pageName ?></h1>

  <p>Here are the thirteen overarching groups of problems that are the backbone of the design of the grandly-named Stella Decimal System (SDS).
    There are 350 individual topics spread among these groups.  Each individual problem has a four-digit call number plus a two-digit decimal.
    For example, the problem about planting ten peach trees has Stella number 1040.11.</p>

  <table id="problems_table" class="topic-overview">
    <tr>
      <th>Topic</th>
      <th>Stella Number</th>
    </tr>
    <tr>
      <td>Visual</td>
      <td>1000-1095</td>
    </tr>
    <tr>
      <td>Logic</td>
      <td>1100-1290, 3750</td>
    </tr>
    <tr>
      <td>Arithmetic, integers</td>
      <td>1300-1342</td>
    </tr>

    <tr>
      <td>Arithmetic</td>
      <td>1350-2022</td>
    </tr>
    <tr>
      <td>Calculator</td>
      <td>1465-1480</td>
    </tr>
    <tr>
      <td>Algebra-Prep</td>
      <td>1530-1550</td>
    </tr>

    <tr>
      <td>Algebra</td>
      <td>2030-2745, 2859-2990</td>
    </tr>
    <tr>
      <td>Symbol Pushing</td>
      <td>2030-2745, 2859-2990</td>
    </tr>
    <tr>
      <td>Analytic Geometry</td>
      <td>2750-2840, 3680-3850</td>
    </tr>

    <tr>
      <td>Informal Geometry</td>
      <td>3000-3080</td>
    </tr>
    <tr>
      <td>Euclidean Geometry</td>
      <td>3100-3650, 3752-3850</td>
    </tr>
    <tr>
      <td>Trigonometry</td>
      <td>4000-4340</td>
    </tr>

    <tr>
      <td>Probability</td>
      <td>4400-4420</td>
    </tr>
  </table>
</div>

<?php include_once(DOCUMENT_ROOT."/includes/sidenav.php") ?>
<?php include(DOCUMENT_ROOT."/includes/footer.php") ?>
