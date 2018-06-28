<?php

class AlgoPathern {

	private static $pathern = [];
	private static $_instance = null;

	private function __construct()
	{

	}

	public static function getPathern()
	{
		return self::$pathern;
	}

	public static function setPathern(string $pathern)
	{
		$pathern_arr = explode(' ', $pathern);

		foreach ($pathern_arr as $key => $value) {
			switch ($value) {
				case 'L':
					$pathern_arr[$key] = 'left';
					break;
				case 'L\'':
					$pathern_arr[$key] = 'leftPrim';
					break;
				case 'R':
					$pathern_arr[$key] = 'right';
					break;
				case 'R\'':
					$pathern_arr[$key] = 'rightPrim';
					break;
				case 'U':
					$pathern_arr[$key] = 'up';
					break;
				case 'U\'':
					$pathern_arr[$key] = 'upPrim';
					break;
				case 'D':
					$pathern_arr[$key] = 'down';
					break;
				case 'D\'':
					$pathern_arr[$key] = 'downPrim';
					break;
				case 'F':
					$pathern_arr[$key] = 'front';
					break;
				case 'F\'':
					$pathern_arr[$key] = 'frontPrim';
					break;
				case 'B':
					$pathern_arr[$key] = 'back';
					break;
				case 'B\'':
					$pathern_arr[$key] = 'backPrim';
					break;
				default:
					throw new Exception("Syntax error from user", 1);
					
					break;
			}
		}

		self::$pathern = $pathern_arr;
		
		return self::$_instance;
	}

	public static function getInstance(array $pathern = []){

		if($pathern != null){

			foreach ($pathern as $movement) {

				if(!is_string($movement)){
					throw new Exception("Only strings must to be set!", 1);
				}
			}
		}

		if(self::$_instance === null){
			self::$_instance = new AlgoPathern($pathern);
		}

		return self::$_instance;
	}

}