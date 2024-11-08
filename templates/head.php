<! DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?? 'Biblioteca' ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	<header class="">
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#"><?= $title ?? 'Biblioteca' ?></a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNav">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="/">Inicio</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="/users">Usuarios</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="/books">Libros</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="/authors">Autores</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="/publishers">Editoriales</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</header>
	<main class="container d-flex flex-column gap-5">