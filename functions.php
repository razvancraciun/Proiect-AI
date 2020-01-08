<?php

function documentContainsSpecifiedTag($filename, $tag) {
	$document = new DomDocument;	
	$document->load($filename);
	$elements = $document->getElementsByTagName(strtoupper($tag));
    $elements1 = $document->getElementsByTagName(strtolower($tag));
    $elements2 = $document->getElementsByTagName($tag);
	if( $elements->length > 0 ) {
		return true;
	}
    if( $elements1->length > 0 ) {
		return true;
	}
    if( $elements2->length > 0 ) {
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
	return $treeDepth - 1;
}

function documentHasNElements($filename, $n, $op) {
	$document = new DomDocument;	
	$document->load($filename);

	$elements = $document->getElementsByTagName('*');
	$numbersOfElements = $elements->length;
	return compare($numbersOfElements, $n, $op);
}

function compare($lhs, $rhs, $op) {
	if($op == 'lt') {
		return $lhs < $rhs;
	} 
	if($op == 'eq') {
		return $lhs == $rhs;
	}
	if($op == 'gt') {
		return $lhs > $rhs;
	}
	return false;
}

?>