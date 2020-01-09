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
              $flag = true;
              $filename = $file->getFilename();
              $path = $DOCUMENT_DIR.$filename;
    		if(isset($_GET['f1']) && $_GET['f1']) {
                    $tag = $_GET['tag'];
                    if(!documentContainsSpecifiedTag($path, $tag)) {
                        $flag = false;
                    }
                }

        if(isset($_GET['f2']) && $_GET['f2']) {
              $parent = $_GET['parent'];
              $child = $_GET['child'];
              if(!(documentContainsWord1UnderWord2($path, $child, $parent) or documentContainsWord1UnderWord2($path, strtoupper($child),strtoupper($parent)) or documentContainsWord1UnderWord2($path, strtolower($child), strtolower($parent)) or documentContainsWord1UnderWord2($path, strtoupper($child), strtolower($parent)) or documentContainsWord1UnderWord2($path,strtolower($child), strtoupper($parent)))) {
                  $flag = false;
              }
          }

        if(isset($_GET['f3']) && $_GET['f3']) {
              $n = $_GET['count'];
              $op = $_GET['sorting3'];
              if(!documentHasNElements($path, $n, $op)) {
                  $flag = false;
              }
          }

        if(isset($_GET['f4']) && $_GET['f4']) {
              $depth = $_GET['depth'];
              $op = $_GET['sorting4'];

              if(!compare(getXMLTreeDepth($path), $depth, $op)) {
                  $flag = false;
              }
        }

        if($flag) {
          $resultFilenames[] = $filename;
        }
		   }
    }

    $resultFilenames = array_unique($resultFilenames);
    foreach($resultFilenames as $filename) {
        $result .= '<a href= "data\\'.$filename.'"><div class="result"><p>'.$filename.'</p></div></a> ';
    }

    return $result;
}

?>
