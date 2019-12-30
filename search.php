<?php
require_once('functions.php');

$DOCUMENT_DIR = getcwd().'/data/';

function search() {
    global $DOCUMENT_DIR;

    $result = '';
    $resultFilenames = array();
    $it = new DirectoryIterator($DOCUMENT_DIR);
    
    foreach($it as $file) {
		if(!$file->isDot()) {
            $filename = $file->getFilename();
            $path = $DOCUMENT_DIR.$filename;
			if(isset($_GET['f1']) && $_GET['f1']) {
                $tag = $_GET['tag'];
                if(documentContainsSpecifiedTag($path, $tag)) {
                    $result .= ' <div class="result"> <p>'.$filename.'</p> </div> ';
                }
            }

            if(isset($_GET['f2']) && $_GET['f2']) {
                $parent = $_GET['parent'];
                $child = $_GET['child'];
                if(documentContainsWord1UnderWord2($path, $child, $parent)) {
                    $result .= ' <div class="result"> <p>'.$filename.'</p> </div> ';
                }
            }

            if(isset($_GET['f3']) && $_GET['f3']) {
                $count = $_GET['count'];
                if(documentHasExactlyNElements($path, $count)) {
                    $result .= ' <div class="result"> <p>'.$filename.'</p> </div> ';
                }
            }

            if(isset($_GET['f4']) && $_GET['f4']) {
                $depth = $_GET['depth'];
                if(getXMLTreeDepth($path) == $depth) {
                    $result .= ' <div class="result"> <p>'.$filename.'</p> </div> ';
                }
            }
		}
	}
    
    return $result;
}

?>