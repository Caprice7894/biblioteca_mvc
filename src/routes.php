<?php
namespace App;

use App\System\Router;
use App\Controllers\UserController;
use App\Controllers\AuthorController;
use App\Controllers\BookController;
use App\Controllers\PublisherController;

$router = new Router();


$router->get("/", function(){
	view('inicio');
});

$router->get('/users', [UserController::class, 'index']);
$router->post('/users',[UserController::class, 'create']);
$router->get('/users/$id/edit', [UserController::class, 'edit']);
$router->post('/users/$id/edit', [UserController::class, 'update']);
$router->delete('/users/$id/delete',[UserController::class, 'delete']);

$router->get('/authors', [AuthorController::class, 'index']);
$router->post('/authors',[AuthorController::class, 'create']);
$router->get('/authors/$id', [AuthorController::class, 'show']);
$router->get('/authors/$id/edit', [AuthorController::class, 'edit']);
$router->post('/authors/$id/edit', [AuthorController::class, 'update']);
$router->delete('/authors/$id/delete',[AuthorController::class, 'delete']);


$router->get('/books', [BookController::class, 'index']);
$router->post('/books',[BookController::class, 'create']);
$router->get('/books/$id', [BookController::class, 'show']);
$router->get('/books/$id/edit', [BookController::class, 'edit']);
$router->post('/books/$id/edit', [BookController::class, 'update']);
$router->delete('/books/$id/delete',[BookController::class, 'delete']);


$router->get('/publishers', [PublisherController::class, 'index']);
$router->post('/publishers',[PublisherController::class, 'create']);
$router->get('/publishers/$id', [PublisherController::class, 'show']);
$router->get('/publishers/$id/edit', [PublisherController::class, 'edit']);
$router->post('/publishers/$id/edit', [PublisherController::class, 'update']);
$router->delete('/publishers/$id/delete',[PublisherController::class, 'delete']);
