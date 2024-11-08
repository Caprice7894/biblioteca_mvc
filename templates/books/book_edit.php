<?php $title = $book->title; require_once __DIR__.'/../head.php' ?>


	<form action="/books/<?= $book->id ?>/edit" class="d-flex gap-3 flex-column mx-20" method="post">
    <div>
        <label class="form-label" for="title">Titulo</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="<?= $book->title ?>">
    </div>

    <div>
        <label class="form-label" for="edition">Edicion</label>
        <input type="text" class="form-control" name="edition" id="edition" placeholder="Enter Edition" value="<?= $book->edition ?>">
    </div>

    <div>
        <label class="form-label" for="synopsis">Sinopsis</label>
        <textarea class="form-control" name="synopsis" id="synopsis" placeholder="Enter Synopsis"><?= $book->synopsis ?></textarea>
    </div>

    <div>
        <label class="form-label" for="year">Año de publicación</label>
        <input type="number" class="form-control" name="year" id="year" placeholder="Enter Year" value="<?= $book->year ?>">
    </div>

    <div>
        <label class="form-label" for="isbn">ISBN</label>
        <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Enter ISBN" value="<?= $book->isbn ?>">
    </div>

    <div>
        <label class="form-label" for="publisher_id">ID de Editorial</label>
        <input type="number" class="form-control" name="publisher_id" id="publisher_id" placeholder="Enter Publisher ID" value="<?= $book->publisher_id ?>">
    </div>

    <div>
        <label class="form-label" for="author_id">ID de Autor</label>
        <input type="number" class="form-control" name="author_id" id="autor_id" placeholder="Enter Publisher ID" value="<?= $book->publisher_id ?>">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

<?php require_once __DIR__.'/../footer.php' ?>
