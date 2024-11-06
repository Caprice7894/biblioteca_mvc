<?php

namespace App\System;

use ArgumentCountError;

class Router{
	protected $request_route;
	protected $request_method;
	public function __construct(){
		$this->request_route = $_SERVER['PATH_INFO'];
		$this->request_method = $_SERVER['REQUEST_METHOD'];
	}

	public function executeRoute($route, $action){
		$uriParams = explode('/', $this->request_route);
		$routeParams = explode('/', $route);
		
		/*
			echo json_encode([$uriParams, $routeParams]);
			exit;
		*/
		$dirbox = [
			'route' => [],
			'uri' => []
		];

		$params = [];

		$posible = true;
		if(sizeof($uriParams) != sizeof($routeParams)){
			$posible = false;
			$GLOBALS['posible'] = $posible;
			return;
		}
		for($i = 0; $i < sizeof($routeParams); $i++){
			if(str_starts_with($routeParams[$i], '$')){
				$params[] = $uriParams[$i];
			}else{
				$dirbox['uri'][] = $uriParams[$i];
				$dirbox['route'][] = $routeParams[$i];
			}
		}
		$simplified_uri = implode('/', $dirbox['uri']);
		$simplified_route = implode('/', $dirbox['route']);

		if(strcmp($simplified_route, $simplified_uri) == 0){
			if(is_callable($action)){
				try{
					call_user_func($action, ...$params);
				}catch(ArgumentCountError $e){
					http_response_code(500);
    				echo "Error: Incorrect number of arguments. " . $e->getMessage();
    				exit;
				}catch(\Exception $e){
					http_response_code(500);
					exit("Ocurrio un error al llamar la clase {$action[0]} <br> {$e->__toString()}");
				}catch(\Error $e){
					http_response_code(500);
    				echo "Error: Incorrect number of arguments. " . $e->getMessage();
    				exit;
				}
			}else if(is_array($action) && sizeof($action) == 2){
				try{
					$controllerClass = new $action[0];
					call_user_func([
						$controllerClass,$action[1]
					], ...$params);
				}catch(ArgumentCountError $e){
					http_response_code(500);
    				echo "Error: Incorrect number of arguments. " . $e->getMessage();
    				exit;
				}catch(\Exception $e){
					http_response_code(500);
					exit("Ocurrio un error al llamar la clase {$action[0]} <br> {$e->__toString()}");
				}catch(\Error $e){
					http_response_code(500);
    				echo "Error: {$e->getCode()}" . $e->getMessage();
    				exit;
				}
			}
			echo "{$GLOBALS['posible']}";
			return;
		}else{
			!$posible = false;
		}

		$GLOBALS['posible'] = $posible;
	}




}
