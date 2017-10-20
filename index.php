<?php
	include ('bin/functions.php');
?>

<html>
    <head>
        <title>Randomly-generated Use Cases</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
			a { text-decoration:none; }
			#content {
				position: absolute;
				width: 700px;
				font-family: Georgia;
				font-size: 50px;
				font-color: black;
				z-Index: 500;
				top: 200px;
				text-align: center;
			}
		</style>
    </head>
    <body>
		<div id="content">
			<?php
				$text = doThings();
				echo $text;
			?>
		</div>
		<canvas id="myCanvas" width="2000" height="1000"></canvas>
		<script src="js/background.js"></script>
    </body>
</html>
