<?php $title = $book->title; require_once __DIR__.'/../head.php' ?>


	<form action="#" class="d-flex gap-3 flex-column mx-20" method="post">
		<div>
			<label class="form-label" for="name">Titulo</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Jhon Doe" value="<?=$book->title?>">
		</div>

		<div>
			<label class="form-label" for="surname">ISBN</label>
			<input type="number" class="form-control" name="surname" id="surname" placeholder="Jhon Doe" value="<?=$book->isbn?>">
		</div>

		<div>
			<label class="form-label" for="publisher_id">Editorial</label>
			<input type="number" class="form-control" name="publisher_id" id="city" placeholder="Jhon Doe" value="<?=$book->publisher_id?>">
		</div>

		<div>
			<label class="form-label" for="edition">Edición</label>
			<input type="number" class="form-control" name="edition" id="edition" placeholder="Jhon Doe" value="<?=$book->edition?>">
		</div>

		<div>
			<label class="form-label" for="year">Año de publicación</label>
			<input type="number" max="<?=date('yyyy')?>" class="form-control" name="year" id="year" placeholder="Jhon Doe" readonly value="<?=$book->year?>">
		</div>

		<div>
			<label class="form-label" for="synopsis">Sinopsis</label>
			<textarea readonly class="form-control" name="synopsis"><?= $book->synopsis ?></textarea>
		</div>
	</form>
	<table class="table">
		<h2>Autores</h2>
		<thead class="">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Ciudad</th>
				<th>Pais</th>
				<th>Fecha</th>
				<th>Telefono</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($authors as $author): ?>
			<tr>
				<td><a href="/authors/<?= $author->id ?>"><?= $author->id ?></a></td>
				<td><?= $author->name ?></td>
				<td><?= $author->surname ?></td>
				<td><?= $author->city ?></td>
				<td><?= $author->country ?></td>
				<td><?= $author->birthdate ?></td>
				<td><?= $author->phone ?></td>
				<td class="d-flex flex-row">
					<a class="btn btn-primary" href="/authors/<?= $author->id ?>/edit">Editar</a>
				</td>
			</tr>
			<?php endforeach; ?>
	</table>

<?php require_once __DIR__.'/../footer.php' ?>
