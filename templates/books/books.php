<?php $title = 'Libros'; require_once __DIR__.'/../head.php' ?>


	<form action="/books" class="d-flex gap-3 flex-column mx-20" method="post">
		<div>
			<label class="form-label" for="title">Titulo</label>
			<input type="text" class="form-control" name="title" id="title" placeholder="Jhon Doe" required>
		</div>

		<div>
			<label class="form-label" for="isbn">ISBN</label>
			<input type="number" class="form-control" name="isbn" id="isbn" placeholder="Jhon Doe" required>
		</div>

		<div>
			<label class="form-label" for="publisher_id">Editorial ID //Deberia de ser un selector con busqueda y funcion de registrar nuevas editoriales</label>
			<input type="number" class="form-control" name="publisher_id" id="city" placeholder="Jhon Doe" required>
		</div>

		<div>
			<label class="form-label" for="edition">Edicion</label>
			<input type="number" class="form-control" name="edition" id="edition" placeholder="Jhon Doe" required>
		</div>

		<div>
			<label class="form-label" for="year">Año de publicación</label>
			<input type="number" max="<?=date('yyyy')?>" class="form-control" name="year" id="year" placeholder="Jhon Doe" required>
		</div>

		<div>
			<label class="form-label" for="author_id">Autor ID //Deberia de ser un selector con busqueda y seleccionar mas de 1 y funcion de registrar nuevo autor</label>
			<input type="number" class="form-control" name="author_id" id="author_id" placeholder="" required>
		</div>

		<div>
			<label for="form-label" for="synopsis">Sinopsis</label>
			<textarea name="synopsis" class="form-control" placeholder="Redacta una sinopsis de libro de máximo 600 caracteres..." maxlength="600"></textarea>
		</div>
		<button class="btn btn-primary">Registrar</button>
	</form>

	<table class="table">
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
					<button action="/books/<?= $book->id ?>/delete" class="btn btn-danger">Borrar</button>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>


	<script>
		function borrarItem(e){
			e.preventDefault();
			const uri = e.target.attributes['action'].nodeValue;
			fetch(uri,{method:"delete"})
				.then(res=>{
					alert(res.status);
					document.location.href = document.location.href;
				});
		}
		const deleteForms = document.querySelectorAll('button.btn-danger');
		deleteForms.forEach((form)=>{
			form.addEventListener('click', borrarItem)
		})
	</script>


<?php require_once __DIR__.'/../footer.php' ?>
