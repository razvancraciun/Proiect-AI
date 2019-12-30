<?php

function documentContainsSpecifiedTag($filename, $tag) {
	$document = new DomDocument;	
	$document->load($filename);

	$elements = $document->getElementsByTagName($tag);
	if( $elements->length > 0 ) {
		return true;
	}
	return false;
}

function documentContainsWord1UnderWord2($filename, $word1, $word2) {
	$document = new DomDocument;	
	$document->load($filename);

	$elements = $document->getElementsByTagName($word2);
	foreach ($elements as $element) {
		foreach($element->childNodes as $node) {
			if(strcmp($node->nodeName, $word1) == 0) {
				return true;
			}
		}
	}
	return false;
}

function getXMLTreeDepth($filename) {
	$document = new DomDocument;	
	$document->load($filename);

	$treeDepth = 0;
	$elements = $document->getElementsByTagName('*');
	foreach ($elements as $element) {
		$xpath = explode('/', $element->getNodePath());
	    $nodeDepth = count($xpath) - 1;
	    $treeDepth = max($treeDepth, $nodeDepth);
	}
	return $treeDepth;
}

function documentHasExactlyNElements($filename, $n) {
	$document = new DomDocument;	
	$document->load($filename);

	$elements = $document->getElementsByTagName('*');
	$numbersOfElements = $elements->length;
	if($numbersOfElements == $n) {
		return true;
	}
	else {
		return false;
	}
}

?>