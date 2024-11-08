<?php $title = 'Usuarios'; require_once 'head.php' ?>


	<form action="/users" class="d-flex gap-3 flex-column mx-20" method="post">
		<div>
			<label class="form-label" for="name">Nombre</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Jhon Doe" required>
		</div>

		<div>
			<label class="form-label" for="email">Correo</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="Jhon Doe" required>
		</div>

		<div>
			<label class="form-label" for="password">Contraseña</label>
			<input type="password" class="form-control" name="password" id="password" placeholder="Jhon Doe" required>
		</div>

		<div>
			<label class="form-label" for="password_confirmation">Confirmar Contraseña</label>
			<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Jhon Doe" required>
		</div>

		<label for="is_admin">
			<input type="checkbox" name="is_admin"> Admin
		</label>

		<button class="btn btn-primary">Registrarme!</button>
	</form>

	<table class="table">
		<thead class="">
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $user): ?>
			<tr>
				<td><?= $user->id ?></td>
				<td><?= $user->name ?></td>
				<td><?= $user->email ?></td>
				<td class="d-flex flex-row">
					<a class="btn btn-primary" href="/users/<?= $user->id ?>/edit">Editar</a>
					<button action="/users/<?= $user->id ?>/delete" class="btn btn-danger">Borrar</button>
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


<?php require_once 'footer.php' ?>
