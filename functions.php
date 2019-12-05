<?php

function documentContainsSpecifiedTag($filename, $tag) {
	$document = new DomDocument;	
	$document->load($filename);

	$elements = $document->getElementsByTagName($tag);
	if( $elements->length > 0 ) {
		return 1;
	}
	return 0;
}

function documentContainsWord1UnderWord2($filename, $word1, $word2) {
	$document = new DomDocument;	
	$document->load($filename);

	$elements = $document->getElementsByTagName($word2);
	foreach ($elements as $element) {
		if( strpos($element->nodeValue, $word1) ) {
			return 1;
		}
	}
	return 0;
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
	if( $treeDepth > 5) {
		return 1;
	}
	return 0;
}

function documentHasExactlyNElements($filename, $n) {
	$document = new DomDocument;	
	$document->load($filename);

	$elements = $document->getElementsByTagName('*');
	$numbersOfElements = $elements->length;
	if($numbersOfElements == $n) {
		return 1;
	}
	else {
		return 0;
	}
}

?>