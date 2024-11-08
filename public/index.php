<?php
require '../vendor/autoload.php';
session_start();
function view($fileName, ?Array $args=null){
	$file = __DIR__ . '/../templates/' . $fileName . '.php';
	if($args == null){
		require_once $file;
		return;
	}

	foreach ($args as $key => $value) {
		$$key = $value;
	}
	require_once $file;
}
$GLOBALS['posible'] = false;

require '../src/routes.php';
if(!$GLOBALS['posible']){
	http_response_code(404);
	exit("Archivo no encontrado");
}