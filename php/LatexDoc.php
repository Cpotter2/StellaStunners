<?php
/*
LatexDoc - Handles writing .tex files and compiling them

Currently, all methods that write to the document's .tex file are private.
The interface, currently only used by make_doc.php, consists of methods that
tell a LatexDoc what it will eventually need to write, such as import statements
for LaTeX packages, or problem indices that the LatexDoc will need to pull
data for.
*/
class LatexDoc {

	// Directory and file name information
	public $dirPath, $baseName;
	public $texFileName, $pdfFileName;

	// Handle to the .tex file
	private $texFile;

	// The LaTeX packages and problems that the document needs.
	// The pacakge array is associative, so that the keys are the names
	// of the packages, and their values are any optional arguments that
	// need to be given.
	public $packages = array(), $problems = array();

	// Title information
	public $author = '', $title = '', $date = '';

	// Font Size
	public $fontSize = '12pt';	
	
	// Initializes file names. Must be given a directory to work in.
	function __construct($dirPath, $baseName = 'doc') {
		$this->dirPath = $dirPath;
		$this->baseName = $baseName;
		$this->texFileName = $dirPath.'/'.$baseName.'.tex';
		$this->pdfFileName = $dirPath.'/'.$baseName.'.pdf';
	}


	// Aliases for writing to the .tex file
	private function write($str) { fwrite($this->texFile, $str); }
	private function writeln($str = '') { $this->write($str."\n"); }

	// Aliases for opening/closing the .tex file
	private function openTexFile() { $this->texFile = fopen($this->texFileName, 'w+'); }
	private function closeTexFile() { fclose($this->texFile); }

	// Add packages and problems to the LaTeX document.
	// The package array is associative
	function usePackage($pkgName, $optStr = '') { $this->packages[$pkgName] = $optStr; }
	function addProblem($problem) { $this->problems[] = $problem; }

	// Setters for document properties
	function setTitle($title) { $this->title = $title; }
	function setAuthor($author) { $this->author = $author; }
	function setDate($date) { $this->date = $date; }
	function setFontSize($size) { $this->fontSize = $size; }


	// Writes the header for the .tex file. This is what declares
	// LaTeX packages and title information.
	private function writeHeader(){
		$this->writeln('\documentclass[' . $this->fontSize . ']{article}');
		foreach ($this->packages as $pkg => $opt) {
			if ($opt != '') { $opt = "[$opt]"; } // Proper LaTeX syntax for package options
			$this->writeln('\usepackage' . $opt . '{' . $pkg . '}');
		}

		$this->writeln('\title{\vspace{-90pt}' . $this->title . '\vspace{-50pt}}');
		$this->writeln('\author{' . $this->author . '}');
		$this->writeln('\date{' . $this->date . '}');
	}

	// Alias for including figures
	private function includeFigure($fileName, $imgSize) { 
		$imgSize = $imgSize ? $imgSize : 0.33;
		$this->writeln("\\\\[2\\baselineskip] \\includegraphics[width=$imgSize\\textwidth]{" . $fileName . "}"); 
	}

	// Given the index number for a problem, writes that problem into
	// the .tex file, also putting in a figure if there is one associated
	// with that problem.
	function writeProblem($problem) {
		$probID = $problem->getID();
		$probTitle = $problem->getTitle();
		$probTitle = str_replace("&", "\\&", $probTitle);
		$this->writeln('\paragraph{' . $probID . ' -- ' . $probTitle . '}');
		$probText = $problem->getProbText();
		$probText = str_replace("<br>", "\\newline ", $probText);
		$probText = str_replace("&nbsp", "", $probText);
		$this->writeln($probText);
		if ($problem->getProbImg()) {
			$probImgSize = $problem->getProbImgSize();
			$this->includeFigure(glob(DOCUMENT_ROOT."/images/stunners/{$problem->getID()}/pfig1.*")[0], $probImgSize);
		}
//		$probDir = DOCUMENT_ROOT.'/problems/problem-data/problem'.$probIndex;
//		$this->writeln('\paragraph{Problem '.$probIndex.'}');
//		$this->writeln(file_get_contents("$probDir/problem_text.txt"));
//		if (file_exists("$probDir/figure.png")) { $this->includeFigure("$probDir/figure.png"); }
	}

	// Writes the entire .tex file based on current class properties. 
	function makeTexFile() {
		$this->openTexFile();
		$this->writeHeader();
		$this->writeln('\begin{document}');
		$this->writeln('\maketitle');
		foreach ($this->problems as $problem) {
			$this->writeProblem($problem);
		}
		$this->writeln('\end{document}');
		$this->closeTexFile();
	}

	// Calls pdflatex on the .tex file and compiles it in the same directory.
	// Returns true if and only if a PDF was sucessfully created.
	// On failure, echos the output of pdflatex.
	function compile() {
		$pdfLatexReport = shell_exec("pdflatex -output-directory $this->dirPath $this->texFileName");
		if (file_exists($this->pdfFileName)) {
			return true;
		} else {
			echo $pdfLatexReport;
			return false;
		}
	}
}
?>
