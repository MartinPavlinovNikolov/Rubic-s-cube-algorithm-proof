<?php

require_once('RubicsCube.php');

$Cube = new RubicsCube(125);

echo '<h1>Rubic`s cube</h1>';

echo '<h2>Finished cube(Starting position)</h2>';
$Cube->drowCube();

echo '<h2>Scrumble the cube ' . $Cube->iterations . ' times</h2>';
$Cube->randomlyScrambling(150, 350);
$Cube->drowCube();

$algoPathern = [
	'left',
	'right',
	'right',
	'back',
	'leftPrim',
	'right',
	'up',
	'up',
	'front',
	'front',
	'left',
	'back',
	'down',
	'up',
	'up',
	'back',
	'left',
	'right',
	'right',
	'back',
	'back',
	'leftPrim',
	'down'
];

$Cube->solve($algoPathern);
$Cube->drowCube();
