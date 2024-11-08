<?php $title = 'Editoriales'; require_once __DIR__.'/../head.php' ?>


	<form action="/publishers" class="d-flex gap-3 flex-column mx-20" method="post">

		<div>
			<label class="form-label" for="name">Nombre</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre" required>
		</div>

		<div>
			<label class="form-label" for="bibliography">Bibliografía</label>
			<input type="text" class="form-control" name="bibliography" id="bibliography" placeholder="Ingrese la bibliografía" required>
		</div>

		<div>
			<label class="form-label" for="city">Ciudad</label>
			<input type="text" class="form-control" name="city" id="city" placeholder="Ingrese la ciudad" required>
		</div>

		<div>
			<label class="form-label" for="country">País</label>
			<input type="text" class="form-control" name="country" id="country" placeholder="Ingrese el país" required>
		</div>

		<div>
			<label class="form-label" for="address">Dirección</label>
			<input type="text" class="form-control" name="address" id="address" placeholder="Ingrese la dirección" required>
		</div>

		<div>
			<label class="form-label" for="foundation_date">Fecha de Fundación</label>
			<input type="date" class="form-control" name="foundation_date" id="foundation_date" required>
		</div>

		<div>
			<label class="form-label" for="phone">Teléfono</label>
			<input type="tel" class="form-control" name="phone" id="phone" placeholder="Ingrese el teléfono" required>
		</div>

		<button class="btn btn-primary">Registrar</button>
	</form>

	<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>País</th>
            <th>Dirección</th>
            <th>Fecha de Fundación</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($publishers as $publisher): ?>
        <tr>
            <td><a href="/publishers/<?= $publisher->id ?>"><?= $publisher->id ?></a></td>
            <td><?= $publisher->name ?></td>
            <td><?= $publisher->city ?></td>
            <td><?= $publisher->country ?></td>
            <td><?= $publisher->address ?></td>
            <td><?= $publisher->foundation_date ?></td>
            <td><?= $publisher->phone ?></td>
            <td class="d-flex flex-row">
                <a class="btn btn-primary" href="/publishers/<?= $publisher->id ?>/edit">Editar</a>
                <button action="/publishers/<?= $publisher->id ?>/delete" class="btn btn-danger">Borrar</button>
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
