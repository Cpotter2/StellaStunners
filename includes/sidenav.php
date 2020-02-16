<div id="sidenav">
<h3>Problem Sets</h3>

<!-- Allows use of ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
//TODO Allow for multiple tags (in show-problem.php)
$(document).ready(function() {
  $("#tag-button").click(function() {
    const selector = $("#tag-selector")[0];
    // console.log(selector);

    const selectedtag = selector.item(selector.selectedIndex).getAttribute("value");
    if (selectedtag == 0) return;

    const links = Array.from($(".side-link"));
    links.forEach(link => {
      let originalLink = link.getAttribute("href");
      let newLink = "";
      //console.log(originalLink.search("tag2"));
      if (originalLink.search("tag2") < 0) {
        newLink = originalLink + "&tag2=" + selectedtag;
      } else if (originalLink.search("tag3") < 0) {
        newLink = originalLink + "&tag3=" + selectedtag;
      } else return;

      link.setAttribute("href", newLink);    
    });
  });
    //console.log($(".side-link"));
});
</script>

<select id="tag-selector">
  <option value="0">Filter</option>
  <optgroup>Course</optgroup>
    <option value="19">Pre-Algebra</option>
    <option value="20">Algebra 1</option>
    <option value="21">Geometry</option>
    <option value="22">Algebra/Trigonometry</option>
    <option value="23">Pre-Calculus Math</option>
  <optgroup>Topic</optgroup>
    <option value="37">Introductory</option>
    <option value="24">Visual</option>
    <option value="25">Logic</option>
    <option value="26">Arithmetic: Z</option>
    <option value="27">Arithmetic: Q & R</option>
    <option value="28">Algebra Prep</option>
    <option value="29">Algebra</option>
    <option value="30">Symbol-Pushing</option>
    <option value="38">Geometry-Informal</option>
    <option value="39">Geometry-Euclidean</option>
    <option value="40">Geometry-Analytical</option>
    <option value="34">Trigonometry</option>
    <option value="35">Pre-Calculus</option>
    <option value="36">Calculator</option>
</select>
<button id="tag-button">Add Tag</button>


<ul>
<?php
// Creates link to Introductory Problems
echo "<a href='/problems/show-tag.php?tag=37'><li>Introductory Problems</li></a>";
/* Creates 18 links on the navbar which the title "Problem Set #" */
for ($i=1; $i<19; $i++){
  $link = "/problems/show-problem.php?tag=set" . $i;
  echo "<a class='side-link' href='/problems/show-tag.php?tag=$i'><li>Problem Set $i</li></a>";
}
echo "<a href='/problems/show-tag.php?tag=41'><li>Problem Set 99</li></a>";
echo "<br />";
echo "<h3>Courses</h3>";
echo "<a href='/problems/show-tag.php?tag=19'><li>Pre-Algebra</li></a>";
echo "<a href='/problems/show-tag.php?tag=20'><li>Algebra I</li></a>";
echo "<a href='/problems/show-tag.php?tag=21'><li>Geometry</li></a>";
echo "<a href='/problems/show-tag.php?tag=22'><li>Algebra/Trigonometry</li></a>";
echo "<a href='/problems/show-tag.php?tag=23'><li>Pre-Calculus Math</li></a>";
echo "<h3>Topic</h3>";
echo "<a href='/problems/show-tag.php?tag=37'><li>Introductory</li></a>";
echo "<a href='/problems/show-tag.php?tag=24'><li>Visual</li></a>";
echo "<a href='/problems/show-tag.php?tag=25'><li>Logic</li></a>";
echo "<a href='/problems/show-tag.php?tag=26'><li>Arithmetic: Z</li></a>";
echo "<a href='/problems/show-tag.php?tag=27'><li>Arithmetic: Q & R</li></a>";
echo "<a href='/problems/show-tag.php?tag=28'><li>Algebra Prep</li></a>";
echo "<a href='/problems/show-tag.php?tag=29'><li>Algebra</li></a>";
echo "<a href='/problems/show-tag.php?tag=30'><li>Symbol-Pushing</li></a>";
echo "<a href='/problems/show-tag.php?tag=38'><li>Geometry-Informal</li></a>";
echo "<a href='/problems/show-tag.php?tag=39'><li>Geometry-Euclidean</li></a>";
echo "<a href='/problems/show-tag.php?tag=40'><li>Geometry-Analytical</li></a>";
echo "<a href='/problems/show-tag.php?tag=34'><li>Trigonometry</li></a>";
echo "<a href='/problems/show-tag.php?tag=35'><li>Pre-Calculus</li></a>";
echo "<a href='/problems/show-tag.php?tag=36'><li>Calculator</li></a>";
?>
</ul>
</div>
