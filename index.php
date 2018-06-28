<?php

require_once('RubicsCube.php');
require_once('AlgoPathern.php');

?>

<h1>Rubic`s cube solver</h1>

<h2>Starting position:</h2>

<?php
$Cube = new RubicsCube();
$Cube->drawCube();

?>
<form method="POST" action="">
	<label for="atempts">Loops Atempts:</label>
	<input id="atempts" type=number name="atempts" value=1 placeholder="number of algorithm loops">
	<label for="algorithm">Algorithm:</label>
	<input id="algorithm" type="text" name="algorithm" value="L R R B L' R U U F F B D U U B L R R B B L' D">
	<input type="submit" name="submit" value="Check">
</form>

<?php
if(isset($_POST['submit'])){
	
	if(!isset($_POST['atempts']) || $_POST['atempts'] == null){
		echo '<h2>Ooopss, you forget to choose how many times algorithm will be aplly!</h2>';
	}elseif(!isset($_POST['algorithm']) || $_POST['algorithm'] == null){
		echo '<h2>Ooopss, you forget to insert algorithm!</h2>';
	}else{

		$atempts = $_POST['atempts'];

		$Cube->randomlyScrambling(150, 350, $atempts);
		echo '<h2>Shuffle the cube.Result after shuffle:</h2>';
		$Cube->drawCube();

		$algoPathern = AlgoPathern::getInstance()->setPathern($_POST['algorithm'])->getPathern();

		$Cube->solve($algoPathern);
		$Cube->drawCube();
	}
}