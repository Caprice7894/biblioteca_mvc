<?php $title = 'Autores'; require_once __DIR__.'/../head.php' ?>


	<form action="/authors" class="d-flex gap-3 flex-column mx-20" method="post">
		<div>
			<label class="form-label" for="name">Nombre</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Jhon Doe">
		</div>

		<div>
			<label class="form-label" for="surname">Apellido</label>
			<input type="text" class="form-control" name="surname" id="surname" placeholder="Jhon Doe">
		</div>

		<div>
			<label class="form-label" for="city">Ciudad</label>
			<input type="text" class="form-control" name="city" id="city" placeholder="Jhon Doe">
		</div>

		<div>
			<label class="form-label" for="country">Pais</label>
			<input type="text" class="form-control" name="country" id="country" placeholder="Jhon Doe">
		</div>

		<div>
			<label class="form-label" for="birthdate">Fecha de nacimiento</label>
			<input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="Jhon Doe">
		</div>

		<div>
			<label class="form-label" for="phone">Telefono</label>
			<input type="phone" class="form-control" name="phone" id="phone" placeholder="Jhon Doe">
		</div>

		<button class="btn btn-primary">Guardar</button>
	</form>

	<table class="table">
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
					<button action="/authors/<?= $author->id ?>/delete" class="btn btn-danger">Borrar</button>
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
