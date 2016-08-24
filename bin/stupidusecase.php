<html>

<head>
<title>Stupid Use Case Generator</title>
</head>

<body>

<?php

echo "As a " . adjective() . " " . noun() . " I want to " . adverb() . " " . verb() . " " . noun() . "s so that I can " . verb() . " " . adjective() . " " . noun() . "s.";

function noun() {
	
	$nouns = file('lists/nouns.txt');
	$countNouns = count($nouns) - 1;
	
	return trim($nouns[rand(0, $countNouns)]);
	
}

function adjective() {

	$adjectives = file('lists/adjectives.txt');
	$countAdjectives = count($adjectives) - 1;
	
	return trim($adjectives[rand(0, $countAdjectives)]);	
	
}

function adverb() {

	$adverbs = file('lists/adverbs.txt');
	$countAdverbs = count($adverbs) - 1;
	
	return trim($adverbs[rand(0, $countAdverbs)]);	
	
}

function verb() {

	$verbs = file('lists/verbs.txt');
	$countVerbs = count($verbs) - 1;
	
	return trim($verbs[rand(0, $countVerbs)]);
	
}

?>

</body>

</html>