var canvas = document.getElementById('myCanvas');
var context = canvas.getContext('2d');

// Make canvas size of window
context.canvas.width = window.innerWidth - 20;
context.canvas.height = window.innerHeight - 20;

var canvasDimensions = {
		width: window.innerWidth,
		mid_x: window.innerWidth/2,
		mid_y: window.innerHeight/2,
		height: window.innerHeight
	};

	
var segmentLength = 18; // How long each segment of a horison is
var segmentCount = Math.ceil(canvasDimensions.width/segmentLength); // Determine how many segments fit on screen
var horizonCount = 12;
var horizonStartY = canvasDimensions.mid_y;
var staticHorizonStartY = canvasDimensions.mid_y;
var horizonStartX = 0;
var horizonChangeMax = 15; // Amount by which points on horizon can vary +/- vertically
var horizonDeltaY = 10; // Amount by which different horizons differ vertically
var horizonSmootheningFactor = 4; // Amount by which nearer horizons become smoother
var horizonNeareningFactor = 1; // Amount by which nearer horizons get lower

drawHills();
drawBraces();
moveContent();

// ******************************************************************************
//                              FUNCTIONS
// ******************************************************************************

function drawHills() {
	
	for (h = 0; h < horizonCount; h++) {
		
		drawHorizon();
		
		// Set / reset parameters for next horizon
		horizonStartY = staticHorizonStartY + (h * horizonDeltaY) + (Math.ceil(Math.random()*2*horizonDeltaY)) - horizonDeltaY; // Make next horizon lower down
		horizonStartX = 0; // Start back at left hand end
		segmentLength = segmentLength + horizonSmootheningFactor; // Make closer horizons smoother
		horizonDeltaY = horizonDeltaY + horizonNeareningFactor;

	}	
	
}

function drawHorizon() {
    
	context.beginPath();
	context.moveTo(horizonStartX, horizonStartY);
	for (s = 0; s < segmentCount; s++) {
		
		horizonStartX = horizonStartX + segmentLength;
		horizonStartY = horizonStartY + (Math.ceil(Math.random()*2*horizonChangeMax)) - horizonChangeMax;
		
		context.lineTo(horizonStartX, horizonStartY); // Draw segment
		
	}
	
	// Draw bottom corners
	context.lineTo(canvasDimensions.width, canvasDimensions.height); // Bottom right
	context.lineTo(0, canvasDimensions.height); // Bottom left
	
	context.closePath();
	
	context.fillStyle = generateSegmentColor(h);
		
	context.fill();
     
}

function generateSegmentColor(horizonCount) {
    
	// Generates a slowly darkening gray color hex string

	var value = 14 - horizonCount;
    color = "#" + value.toString(16) + value.toString(16) + value.toString(16);
    return color;
    
}

function moveContent() {
	
	document.getElementById("content").style.left = window.innerWidth/2 - document.getElementById("content").clientWidth/2;
	document.getElementById("content").style.top = window.innerHeight * 0.2;
	
}

function drawBraces() {
	
	size = document.getElementById("content").clientHeight;
	top_left_x = Math.ceil(window.innerWidth/2 - 350);
	top_left_y = Math.ceil(0.20 * window.innerHeight);
	top_right_x = Math.ceil(window.innerWidth/2 + 350);

	// Left Brace
	context.beginPath();
	context.fillStyle = "#444";
	context.font = size + "px Georgia";
	context.fillText("{", top_left_x - 80, top_left_y + (0.77*size), 50);
	
	// Right Brace
	context.beginPath();
	context.fillStyle = "#444";
	context.font = size + "px Georgia";
	context.fillText("}", top_right_x + 30, top_left_y + (0.77*size), 50);
	
}
