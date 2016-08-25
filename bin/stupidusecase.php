<html>

<head>
<title>Stupid Use Case Generator</title>
</head>

<body>

<?php

echo "As a";

$adj = adjective();
if (substr($adj, 0, 1) == "a" || substr($adj, 0, 1) == "e" || substr($adj, 0, 1) == "i" || substr($adj, 0, 1) == "o" || substr($adj, 0, 1) == "u") {
	echo "n " . $adj;
} else {
	echo " " . $adj;
}
 
echo " " . noun() . " I want to " . adverb() . " " . verb() . " ";

$noun = noun();
if (substr($noun, -1) == "s") {
	echo $noun . "e";
} else {
	echo $noun;
}

echo "s so that I can " . verb() . " " . adjective() . " ";

$noun = noun();
if (substr($noun, -1) == "s" || substr($noun, -1) == "h") {
	echo $noun . "e";
} else {
	echo $noun;
}

echo "s.";

function noun() {
	
	$nouns = file('lists/nouns.txt');
	$countNouns = count($nouns) - 1;
	srand();
	return trim($nouns[rand(0, $countNouns)]);
	
}

function adjective() {

	$adjectives = file('lists/adjectives.txt');
	$countAdjectives = count($adjectives) - 1;
	srand();
	return trim($adjectives[rand(0, $countAdjectives)]);	
	
}

function adverb() {

	$adverbs = file('lists/adverbs.txt');
	$countAdverbs = count($adverbs) - 1;
	srand();
	return trim($adverbs[rand(0, $countAdverbs)]);	
	
}

function verb() {

	$verbs = file('lists/verbs.txt');
	$countVerbs = count($verbs) - 1;
	srand();
	return trim($verbs[rand(0, $countVerbs)]);
	
}

?>

</body>

</html>