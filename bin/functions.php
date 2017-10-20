<?php

function doThings() {
	
	$text = "As a";

	$adj = adjective();
	if (substr($adj, 0, 1) == "a" || substr($adj, 0, 1) == "e" || substr($adj, 0, 1) == "i" || substr($adj, 0, 1) == "o" || substr($adj, 0, 1) == "u") {
		$text = $text . "n " . $adj;
	} else {
		$text = $text . " " . $adj;
	}
	 
	$text = $text . " " . noun() . " I want to " . adverb() . " " . verb() . " ";

	$noun = noun();
	if (substr($noun, -1) == "s") {
		$text = $text . $noun . "e";
	} else {
		$text = $text . $noun;
	}

	$text = $text . "s so that I can " . verb() . " " . adjective() . " ";

	$noun = noun();
	if (substr($noun, -1) == "s" || substr($noun, -1) == "h") {
		$text = $text . $noun . "e";
	} else {
		$text = $text . $noun;
	}

	$text = $text . "s.";
	
	return $text;
	
}

function noun() {
	
	$nouns = file('http://www.rcpaterson.co.uk/StupidUseCases/bin/lists/nouns.txt');
	$countNouns = count($nouns) - 1;
	srand();
	return trim($nouns[rand(0, $countNouns)]);
	
}

function adjective() {

	$adjectives = file('http://www.rcpaterson.co.uk/StupidUseCases/bin/lists/adjectives.txt');
	$countAdjectives = count($adjectives) - 1;
	srand();
	return trim($adjectives[rand(0, $countAdjectives)]);	
	
}

function adverb() {

	$adverbs = file('http://www.rcpaterson.co.uk/StupidUseCases/bin/lists/adverbs.txt');
	$countAdverbs = count($adverbs) - 1;
	srand();
	return trim($adverbs[rand(0, $countAdverbs)]);	
	
}

function verb() {

	$verbs = file('http://www.rcpaterson.co.uk/StupidUseCases/bin/lists/verbs.txt');
	$countVerbs = count($verbs) - 1;
	srand();
	return trim($verbs[rand(0, $countVerbs)]);
	
}

?>