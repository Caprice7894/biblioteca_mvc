<?php
require '../vendor/autoload.php';

$GLOBALS['posible'] = true;

require '../src/routes.php';

if(!$GLOBALS['posible']){
	http_response_code(404);
	exit("Archivo no encontrado");
}