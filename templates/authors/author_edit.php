<?php $title = $author->name; require_once __DIR__.'/../head.php' ?>


	<form action="/authors/<?= $author->id ?>/edit" class="d-flex gap-3 flex-column mx-20" method="post">
		<div>
			<label class="form-label" for="name">Nombre</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Jhon Doe" value="<?=$author->name?>">
		</div>

		<div>
			<label class="form-label" for="surname">Apellido</label>
			<input type="text" class="form-control" name="surname" id="surname" placeholder="Jhon Doe" value="<?=$author->surname?>">
		</div>

		<div>
			<label class="form-label" for="city">Ciudad</label>
			<input type="text" class="form-control" name="city" id="city" placeholder="Jhon Doe" value="<?=$author->city?>">
		</div>

		<div>
			<label class="form-label" for="country">Pais</label>
			<input type="text" class="form-control" name="country" id="country" placeholder="Jhon Doe" value="<?=$author->country?>">
		</div>

		<div>
			<label class="form-label" for="birthdate">Fecha de nacimiento</label>
			<input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="Jhon Doe" value="<?=$author->birthdate?>">
		</div>

		<div>
			<label class="form-label" for="phone">Telefono</label>
			<input type="phone" class="form-control" name="phone" id="phone" placeholder="Jhon Doe" value="<?=$author->phone?>">
		</div>

		<button class="btn btn-primary">Guardar</button>
	</form>

<?php require_once __DIR__.'/../footer.php' ?>
