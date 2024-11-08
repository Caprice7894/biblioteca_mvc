<?php

namespace App\System;

use ArgumentCountError;

class Router{
	protected $request_route;
	protected $request_method;
	public function __construct(){
		$this->request_route = $_SERVER['REQUEST_URI'];
		$this->request_method = $_SERVER['REQUEST_METHOD'];
	}

	public function executeRoute($route, $action){
		$posible = $GLOBALS['posible'];
		if($posible)
			return;
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

		if(sizeof($uriParams) != sizeof($routeParams)){
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
					$posible = true;
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
					$posible = true;
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
			$GLOBALS['posible'] = $posible;
			return;
		}
	}

	public function get($route, $action){
		if($this->request_method != 'GET'){
			return null;
		}
		return $this->executeRoute($route, $action);
	}

	public function post($route, $action){
		if($this->request_method != 'POST'){
			return null;
		}
		return $this->executeRoute($route, $action);
	}

	public function put($route, $action){
		if($this->request_method != 'PUT'){
			return null;
		}
		return $this->executeRoute($route, $action);
	}

	public function delete($route, $action){
		if($this->request_method != 'DELETE'){
			return null;
		}
		return $this->executeRoute($route, $action);
	}

	public function patch($route, $action){
		if($this->request_method != 'PATCH'){
			return null;
		}
		return $this->executeRoute($route, $action);
	}
}
