<?php $title = $publisher->name; require_once __DIR__.'/../head.php' ?>


	<form action="#" class="d-flex gap-3 flex-column mx-20" method="post">
	    <div>
	        <label class="form-label" for="name">Nombre</label>
	        <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre" value="<?= $publisher->name ?>">
	    </div>

	    <div>
	        <label class="form-label" for="bibliography">Bibliografía</label>
	        <input type="text" class="form-control" name="bibliography" id="bibliography" placeholder="Ingrese la bibliografía" value="<?= $publisher->bibliography ?>">
	    </div>

	    <div>
	        <label class="form-label" for="city">Ciudad</label>
	        <input type="text" class="form-control" name="city" id="city" placeholder="Ingrese la ciudad" value="<?= $publisher->city ?>">
	    </div>

	    <div>
	        <label class="form-label" for="country">País</label>
	        <input type="text" class="form-control" name="country" id="country" placeholder="Ingrese el país" value="<?= $publisher->country ?>">
	    </div>

	    <div>
	        <label class="form-label" for="address">Dirección</label>
	        <input type="text" class="form-control" name="address" id="address" placeholder="Ingrese la dirección" value="<?= $publisher->address ?>">
	    </div>

	    <div>
	        <label class="form-label" for="foundation_date">Fecha de Fundación</label>
	        <input type="date" class="form-control" name="foundation_date" id="foundation_date" value="<?= $publisher->foundation_date ?>">
	    </div>

	    <div>
	        <label class="form-label" for="phone">Teléfono</label>
	        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Ingrese el teléfono" value="<?= $publisher->phone ?>">
	    </div>
	</form>
	<table class="table">
		<h2>Libros</h2>
		<thead class="">
			<tr>
				<th>ID</th>
				<th>ISBN</th>
				<th>Titulo</th>
				<th>Año</th>
				<th>Editorial</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($books as $book): ?>
			<tr>
				<td><a href="/books/<?= $book->id ?>"><?= $book->id ?></a></td>
				<td><?= $book->isbn ?></td>
				<td><?= $book->title ?></td>
				<td><?= $book->edition ?></td>
				<td><?= $book->year ?></td>
				<td><a href="/publishers/<?= $book->publisher_id ?>">Editorial</a></td>
				<td class="d-flex flex-row">
					<a class="btn btn-primary" href="/books/<?= $book->id ?>/edit">Editar</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

<?php require_once __DIR__.'/../footer.php' ?>
