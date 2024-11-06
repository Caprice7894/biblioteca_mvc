<?php
namespace App;

use App\System\Router;
use App\Controllers\UserController;

$router = new Router();

$router->executeRoute("/holamundo", function(){
	echo "Hola mundo";
});

$router->executeRoute('/pan/$id', [UserController::class, 'index']);