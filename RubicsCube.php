<?php

/*
 * This class provide test for algorithm in youtube.
 * The cube is randomly scrymbled in any test!
 * @author Martin Nikolov.
 */

class RubicsCube {
	
	/* how many iterations will be done */
	public $iterations = null;

	/* all collors on each side of the cube */

	private $frontSide = [
  		'top-left' => 'red',
  		'top-middle' => 'red',
  		'top-right' => 'red',
  		'middle-left' => 'red',
  		'middle-middle' => 'red',
  		'middle-right' => 'red',
  		'bottom-left' => 'red',
  		'bottom-middle' => 'red',
  		'bottom-right' => 'red'
	];

	private $backSide = [
		'top-left' => 'green',
  		'top-middle' => 'green',
  		'top-right' => 'green',
  		'middle-left' => 'green',
  		'middle-middle' => 'green',
  		'middle-right' => 'green',
  		'bottom-left' => 'green',
  		'bottom-middle' => 'green',
  		'bottom-right' => 'green'
	];

	private $leftSide = [
  		'top-left' => 'blue',
  		'top-middle' => 'blue',
  		'top-right' => 'blue',
  		'middle-left' => 'blue',
  		'middle-middle' => 'blue',
  		'middle-right' => 'blue',
  		'bottom-left' => 'blue',
  		'bottom-middle' => 'blue',
  		'bottom-right' => 'blue'
	];

	private $rightSide = [
  		'top-left' => 'orange',
  		'top-middle' => 'orange',
  		'top-right' => 'orange',
  		'middle-left' => 'orange',
  		'middle-middle' => 'orange',
  		'middle-right' => 'orange',
  		'bottom-left' => 'orange',
  		'bottom-middle' => 'orange',
  		'bottom-right' => 'orange'
  	];

	private $upSide = [
  		'top-left' => 'yellow',
  		'top-middle' => 'yellow',
  		'top-right' => 'yellow',
  		'middle-left' => 'yellow',
  		'middle-middle' => 'yellow',
  		'middle-right' => 'yellow',
  		'bottom-left' => 'yellow',
  		'bottom-middle' => 'yellow',
  		'bottom-right' => 'yellow'
	];

	private $downSide = [
  		'top-left' => 'white',
  		'top-middle' => 'white',
  		'top-right' => 'white',
  		'middle-left' => 'white',
  		'middle-middle' => 'white',
  		'middle-right' => 'white',
  		'bottom-left' => 'white',
  		'bottom-middle' => 'white',
  		'bottom-right' => 'white'
  	];

	/* this helps, when we rotate the cube */
	private $cacheCube = null;

	public function __construct ($iterations = 100)
	{
		
	}
	
	/*
	 * Check "is cube is complite?".
	 * @return bool
	 */
	public function isReady ()
	{
		return (bool)(
			$this->frontSide['top-left'] === 'red' &&
			$this->frontSide['top-middle'] === 'red' &&
			$this->frontSide['top-right'] === 'red' &&
			$this->frontSide['middle-left'] === 'red' &&
			$this->frontSide['middle-right'] === 'red' &&
			$this->frontSide['bottom-left'] === 'red' &&
			$this->frontSide['bottom-middle'] === 'red' &&
			$this->frontSide['bottom-right'] === 'red' &&

			$this->backSide['top-left'] === 'green' &&
			$this->backSide['top-middle'] === 'green' &&
			$this->backSide['top-right'] === 'green' &&
			$this->backSide['middle-left'] === 'green' &&
			$this->backSide['middle-right'] === 'green' &&
			$this->backSide['bottom-left'] === 'green' &&
			$this->backSide['bottom-middle'] === 'green' &&
			$this->backSide['bottom-right'] === 'green' &&

			$this->leftSide['top-left'] === 'blue' &&
			$this->leftSide['top-middle'] === 'blue' &&
			$this->leftSide['top-right'] === 'blue' &&
			$this->leftSide['middle-left'] === 'blue' &&
			$this->leftSide['middle-right'] === 'blue' &&
			$this->leftSide['bottom-left'] === 'blue' &&
			$this->leftSide['bottom-middle'] === 'blue' &&
			$this->leftSide['bottom-right'] === 'blue' &&

			$this->rightSide['top-left'] === 'orange' &&
			$this->rightSide['top-middle'] === 'orange' &&
			$this->rightSide['top-right'] === 'orange' &&
			$this->rightSide['middle-left'] === 'orange' &&
			$this->rightSide['middle-right'] === 'orange' &&
			$this->rightSide['bottom-left'] === 'orange' &&
			$this->rightSide['bottom-middle'] === 'orange' &&
			$this->rightSide['bottom-right'] === 'orange' &&

			$this->upSide['top-left'] === 'yellow' &&
			$this->upSide['top-middle'] === 'yellow' &&
			$this->upSide['top-right'] === 'yellow' &&
			$this->upSide['middle-left'] === 'yellow' &&
			$this->upSide['middle-right'] === 'yellow' &&
			$this->upSide['bottom-left'] === 'yellow' &&
			$this->upSide['bottom-middle'] === 'yellow' &&
			$this->upSide['bottom-right'] === 'yellow'
		);
	}

	public function left()
	{
		$this->cacheCube = clone $this;

		$this->frontSide['top-left'] = $this->upSide['top-left'];
		$this->frontSide['middle-left'] = $this->upSide['middle-left'];
		$this->frontSide['bottom-left'] = $this->upSide['bottom-left'];

		$this->upSide['top-left'] = $this->backSide['bottom-right'];
		$this->upSide['middle-left'] = $this->backSide['middle-right'];
		$this->upSide['bottom-left'] = $this->backSide['top-right'];

		$this->backSide['bottom-right'] = $this->downSide['bottom-left'];
		$this->backSide['middle-right'] = $this->downSide['middle-left'];
		$this->backSide['top-right'] = $this->downSide['top-left'];

		$this->downSide['top-left'] = $this->cacheCube->frontSide['bottom-left'];
		$this->downSide['middle-left'] = $this->cacheCube->frontSide['middle-left'];
		$this->downSide['bottom-left'] = $this->cacheCube->frontSide['top-left'];

		$this->leftSide['top-left'] = $this->cacheCube->leftSide['bottom-left'];
		$this->leftSide['top-middle'] = $this->cacheCube->leftSide['middle-left'];
		$this->leftSide['top-right'] = $this->cacheCube->leftSide['top-left'];
		$this->leftSide['middle-left'] = $this->cacheCube->leftSide['bottom-middle'];
		$this->leftSide['middle-right'] = $this->cacheCube->leftSide['top-middle'];
		$this->leftSide['bottom-left'] = $this->cacheCube->leftSide['bottom-right'];
		$this->leftSide['bottom-middle'] = $this->cacheCube->leftSide['middle-right'];
		$this->leftSide['bottom-right'] = $this->cacheCube->leftSide['top-right'];

		$this->cacheCube = null;

		return $this;
	}

	public function right()
	{
		$this->cacheCube = clone $this;
		
		$this->frontSide['top-right'] = $this->downSide['bottom-right'];
		$this->frontSide['middle-right'] = $this->downSide['middle-right'];
		$this->frontSide['bottom-right'] = $this->downSide['top-right'];
		
		$this->downSide['top-right'] = $this->backSide['top-left'];
		$this->downSide['middle-right'] = $this->backSide['middle-left'];
		$this->downSide['bottom-right'] = $this->backSide['bottom-left'];
		
		$this->backSide['top-left'] = $this->upSide['bottom-right'];
		$this->backSide['middle-left'] = $this->upSide['middle-right'];
		$this->backSide['bottom-left'] = $this->upSide['top-right'];

		$this->upSide['top-right'] = $this->cacheCube->frontSide['top-right'];
		$this->upSide['middle-right'] = $this->cacheCube->frontSide['middle-right'];
		$this->upSide['bottom-right'] = $this->cacheCube->frontSide['bottom-right'];



		$this->rightSide['top-left'] = $this->cacheCube->rightSide['bottom-left'];
		$this->rightSide['top-middle'] = $this->cacheCube->rightSide['middle-left'];
		$this->rightSide['top-right'] = $this->cacheCube->rightSide['top-left'];
		$this->rightSide['middle-right'] = $this->cacheCube->rightSide['top-middle'];
		$this->rightSide['bottom-right'] = $this->cacheCube->rightSide['top-right'];
		$this->rightSide['bottom-middle'] = $this->cacheCube->rightSide['middle-right'];
		$this->rightSide['bottom-left'] = $this->cacheCube->rightSide['bottom-right'];
		$this->rightSide['middle-left'] = $this->cacheCube->rightSide['bottom-middle'];

		$this->cacheCube = null;

		return $this;
	}

	public function up()	
	{
		$this->cacheCube = clone $this;
		
		$this->frontSide['top-left'] = $this->rightSide['top-left'];
		$this->frontSide['top-middle'] = $this->rightSide['top-middle'];
		$this->frontSide['top-right'] = $this->rightSide['top-right'];

		$this->rightSide['top-left'] = $this->backSide['top-left'];
		$this->rightSide['top-middle'] = $this->backSide['top-middle'];
		$this->rightSide['top-right'] = $this->backSide['top-right'];

		$this->backSide['top-left'] = $this->leftSide['top-left'];
		$this->backSide['top-middle'] = $this->leftSide['top-middle'];
		$this->backSide['top-right'] = $this->leftSide['top-right'];
		
		$this->leftSide['top-left'] = $this->cacheCube->frontSide['top-left'];
		$this->leftSide['top-middle'] = $this->cacheCube->frontSide['top-middle'];
		$this->leftSide['top-right'] = $this->cacheCube->frontSide['top-right'];

		$this->upSide['top-left'] = $this->cacheCube->upSide['bottom-left'];
		$this->upSide['top-middle'] = $this->cacheCube->upSide['middle-left'];
		$this->upSide['top-right'] = $this->cacheCube->upSide['top-left'];
		$this->upSide['middle-right'] = $this->cacheCube->upSide['top-middle'];
		$this->upSide['bottom-right'] = $this->cacheCube->upSide['top-right'];
		$this->upSide['bottom-middle'] = $this->cacheCube->upSide['middle-right'];
		$this->upSide['bottom-left'] = $this->cacheCube->upSide['bottom-right'];
		$this->upSide['middle-left'] = $this->cacheCube->upSide['bottom-middle'];

		$this->cacheCube = null;

		return $this;
	}

	public function down()
	{
		$this->cacheCube = clone $this;
		
		$this->frontSide['bottom-left'] = $this->leftSide['bottom-left'];
		$this->frontSide['bottom-middle'] = $this->leftSide['bottom-middle'];
		$this->frontSide['bottom-right'] = $this->leftSide['bottom-right'];

		$this->leftSide['bottom-left'] = $this->backSide['bottom-left'];
		$this->leftSide['bottom-middle'] = $this->backSide['bottom-middle'];
		$this->leftSide['bottom-right'] = $this->backSide['bottom-right'];

		$this->backSide['bottom-left'] = $this->rightSide['bottom-left'];
		$this->backSide['bottom-middle'] = $this->rightSide['bottom-middle'];
		$this->backSide['bottom-right'] = $this->rightSide['bottom-right'];
		
		$this->rightSide['bottom-left'] = $this->cacheCube->frontSide['bottom-left'];
		$this->rightSide['bottom-middle'] = $this->cacheCube->frontSide['bottom-middle'];
		$this->rightSide['bottom-right'] = $this->cacheCube->frontSide['bottom-right'];

		$this->downSide['top-left'] = $this->cacheCube->downSide['top-right'];
		$this->downSide['top-middle'] = $this->cacheCube->downSide['middle-right'];
		$this->downSide['top-right'] = $this->cacheCube->downSide['bottom-right'];
		$this->downSide['middle-right'] = $this->cacheCube->downSide['bottom-middle'];
		$this->downSide['bottom-right'] = $this->cacheCube->downSide['bottom-left'];
		$this->downSide['bottom-middle'] = $this->cacheCube->downSide['middle-left'];
		$this->downSide['bottom-left'] = $this->cacheCube->downSide['top-left'];
		$this->downSide['middle-left'] = $this->cacheCube->downSide['top-middle'];

		$this->cacheCube = null;

		return $this;
	}

	public function front()
	{
		$this->cacheCube = clone $this;
		
		$this->upSide['bottom-left'] = $this->leftSide['bottom-right'];
		$this->upSide['bottom-middle'] = $this->leftSide['middle-right'];
		$this->upSide['bottom-right'] = $this->leftSide['top-right'];

		$this->leftSide['top-right'] = $this->downSide['bottom-left'];
		$this->leftSide['middle-right'] = $this->downSide['bottom-middle'];
		$this->leftSide['bottom-right'] = $this->downSide['bottom-right'];

		$this->downSide['bottom-left'] = $this->rightSide['bottom-left'];
		$this->downSide['bottom-middle'] = $this->rightSide['middle-left'];
		$this->downSide['bottom-right'] = $this->rightSide['top-left'];
		
		$this->rightSide['top-left'] = $this->cacheCube->upSide['bottom-left'];
		$this->rightSide['middle-left'] = $this->cacheCube->upSide['bottom-middle'];
		$this->rightSide['bottom-left'] = $this->cacheCube->upSide['bottom-right'];

		$this->frontSide['top-left'] = $this->cacheCube->frontSide['bottom-left'];
		$this->frontSide['top-middle'] = $this->cacheCube->frontSide['middle-left'];
		$this->frontSide['top-right'] = $this->cacheCube->frontSide['top-left'];
		$this->frontSide['middle-right'] = $this->cacheCube->frontSide['top-middle'];
		$this->frontSide['bottom-right'] = $this->cacheCube->frontSide['top-right'];
		$this->frontSide['bottom-middle'] = $this->cacheCube->frontSide['middle-right'];
		$this->frontSide['bottom-left'] = $this->cacheCube->frontSide['bottom-right'];
		$this->frontSide['middle-left'] = $this->cacheCube->frontSide['bottom-middle'];

		$this->cacheCube = null;

		return $this;
	}

	public function back()
	{
		$this->cacheCube = clone $this;
		
		$this->upSide['top-left'] = $this->rightSide['top-right'];
		$this->upSide['top-middle'] = $this->rightSide['middle-right'];
		$this->upSide['top-right'] = $this->rightSide['bottom-right'];

		$this->rightSide['top-right'] = $this->downSide['top-right'];
		$this->rightSide['middle-right'] = $this->downSide['top-middle'];
		$this->rightSide['bottom-right'] = $this->downSide['top-left'];

		$this->downSide['top-left'] = $this->leftSide['top-left'];
		$this->downSide['top-middle'] = $this->leftSide['middle-left'];
		$this->downSide['top-right'] = $this->leftSide['bottom-left'];
		
		$this->leftSide['top-left'] = $this->cacheCube->upSide['top-right'];
		$this->leftSide['middle-left'] = $this->cacheCube->upSide['top-middle'];
		$this->leftSide['bottom-left'] = $this->cacheCube->upSide['top-left'];

		$this->backSide['top-left'] = $this->cacheCube->backSide['bottom-left'];
		$this->backSide['top-middle'] = $this->cacheCube->backSide['middle-left'];
		$this->backSide['top-right'] = $this->cacheCube->backSide['top-left'];
		$this->backSide['middle-right'] = $this->cacheCube->backSide['top-middle'];
		$this->backSide['bottom-right'] = $this->cacheCube->backSide['top-right'];
		$this->backSide['bottom-middle'] = $this->cacheCube->backSide['middle-right'];
		$this->backSide['bottom-left'] = $this->cacheCube->backSide['bottom-right'];
		$this->backSide['middle-left'] = $this->cacheCube->backSide['bottom-middle'];

		$this->cacheCube = null;

		return $this;
	}

	public function leftPrim()
	{
		$this->left()->left()->left();

		return $this;
	}

	public function rightPrim()
	{
		$this->right()->right()->right();

		return $this;
	}

	public function upPrim()
	{
		$this->up()->up()->up();

		return $this;
	}

	public function downPrim()
	{
		$this->down()->down()->down();

		return $this;
	}

	public function frontPrim()
	{
		$this->front()->front()->front();

		return $this;
	}

	public function backPrim()
	{
		$this->back()->back()->back();

		return $this;
	}

	/* 
	 *Scrumble the cube
	 */
	public function randomlyScrambling($turnsFromPositiveNumber = 150, $toBiggerNumber = 350, $iterations = 1){
		
		if($iterations >= 120000){
			echo '<h2>Too big number. Recomended somthing small</h2>';
		}
		$this->iterations = $iterations;

	  	$posibleMoves = [
	  		'left', 'right', 'up', 'down', 'front', 'back','leftPrim', 'rightPrim', 'upPrim', 'downPrim', 'frontPrim', 'backPrim'
	  	];

  		$rand = rand($turnsFromPositiveNumber, $toBiggerNumber);

  		for($i=0;$i < $rand;$i++){
  			$move = $posibleMoves[rand(0, 11)];
	  		$this->$move();
		}

		return $this;
	}

	/*
	 * Draw the cube in the browser.
	 */
	public function drawCube(){

		$avalableSides = ['frontSide', 'backSide', 'leftSide', 'rightSide', 'upSide', 'downSide'];
		$coordinates = [
			'top-left', 'top-middle', 'top-right',
			'middle-left', 'middle-middle', 'middle-right',
			'bottom-left', 'bottom-middle', 'bottom-right'
		];

		echo '<div class="container">
			<div class="box">';

		for($j=0;$j<6;$j++){

			echo "<div class=" . rtrim($avalableSides[$j], 'Side') . ">";

			for($i=0;$i<9;$i++){
				$side = $avalableSides[$j];
				echo '<div style="display:inline-block;border:1px solid black;box-sizing:border-box;border-radius: 5px;width:60px;height:60px;background-color:' . $this->$side[$coordinates[$i]] . '"></div>' . ($i==2 || $i==5 || $i==8 ? '<br>' : '');
			}

			echo '</div>';
		}
		
		echo '</div></div><hr>';

		return $this;
	}

	public function solve($algoPathern){

		$times = 1;

		for($i=0;$i<=$this->iterations;$i++){
		    
			foreach($algoPathern as $step){

		    	$this->$step();

		    	if($this->isReady()){
					echo '<h2>Success after' . $times . ' moves</h2>';

		    		return;
		    	}

		    	$times++;
		    }

		}

		$moves = count($algoPathern) * $this->iterations;
		echo '<h2>Busted!!! (Finished position after ' . $moves . ' moves)</h2>';
	}

}