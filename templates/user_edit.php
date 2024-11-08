<?php $title = $user->name; require_once 'head.php' ?>


	<form action="/users/<?= $user->id ?>/edit" class="d-flex gap-3 flex-column mx-20" method="post">
		<div>
			<label class="form-label" for="name">Nombre</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Jhon Doe" value="<?=$user->name?>">
		</div>

		<div>
			<label class="form-label" for="email">Correo</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="Jhon Doe" value="<?= $user->email ?>">
		</div>

		<div>
			<label class="form-label" for="password">Contraseña</label>
			<input type="password" class="form-control" name="password" id="password" placeholder="Jhon Doe">
		</div>

		<div>
			<label class="form-label" for="password_confirmation">Confirmar Contraseña</label>
			<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Jhon Doe">
		</div>

		<label for="is_admin">
			<?php if($user->is_admin): ?>
			<input type="checkbox" checked name="is_admin"> Admin
			<?php else: ?>
			<input type="checkbox" name="is_admin"> Admin
			<?php endif; ?>
		</label>


		<button class="btn btn-primary">Guardar</button>
	</form>

<?php require_once 'footer.php' ?>
