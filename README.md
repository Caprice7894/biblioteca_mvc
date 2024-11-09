# Sistema Bibliográfico

## Descripción

Este es un sistema bibliográfico desarrollado en PHP 8 que permite gestionar datos de **libros**, **autores** y **editoriales**. El sistema sigue el patrón de diseño **MVC** (Modelo-Vista-Controlador) y proporciona una interfaz de usuario sencilla utilizando **Bootstrap** para el diseño responsivo. 

El sistema permite realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) sobre las tres entidades principales: libros, autores y editoriales.

## Requisitos

Para ejecutar este proyecto, necesitarás tener instalado:

- PHP 8 o superior
- SQLite3
- Composer

### SQL para Crear las Tablas

Puedes usar el siguiente script SQL para crear las tablas en tu base de datos:

```sql
CREATE TABLE users(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name varchar(100) NOT NULL,
	email varchar(200) NOT NULL UNIQUE,
	password varchar(255) NOT NULL,
	is_admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE authors(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR(100) NOT NULL,
	surname VARCHAR(100) NOT NULL,
	bibliography TEXT NULL,
	city VARCHAR(100) NOT NULL,
	country VARCHAR(100) NOT NULL,
	birthdate DATE NOT NULL,
	phone VARCHAR(20)
);

CREATE TABLE publishers(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR(100) NOT NULL,
	bibliography TEXT NULL,
	city VARCHAR(100) NOT NULL,
	country VARCHAR(100) NOT NULL,
	address VARCHAR(255) NOT NULL,
	foundation_date DATE NOT NULL,
	phone VARCHAR(20)
);

CREATE TABLE labels(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR(100) NOT NULL UNIQUE,
	description TEXT NULL
);

CREATE TABLE books(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	title VARCHAR(255) NOT NULL,
	edition SMALLINT NOT NULL,
	synopsis TEXT(600) NULL,
	year SMALLINT NOT NULL,
	isbn BIGINT(13) NOT NULL,
	publisher_id INTEGER NOT NULL,
	FOREIGN KEY(publisher_id) REFERENCES publishers(id)
);

CREATE TABLE author_book(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	author_id INTEGER,
	book_id INTEGER,
	FOREIGN KEY(author_id) REFERENCES authors(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(book_id) REFERENCES books(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE book_label(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	book_id INTEGER,
	label_id INTEGER,
	FOREIGN KEY(book_id) REFERENCES books(id) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(label_id) REFERENCES labels(id) ON DELETE CASCADE ON UPDATE CASCADE

```

## Instalación

1. **Clona el repositorio**:

	```bash
	git clone https://github.com/Caprice7894/biblioteca.git
	```

2. **Configura la base de datos**:
	- Crea una base de datos en SQLite, MySQL o MariaDB.
	- Ejecuta el script SQL para crear las tablas.

3. **Configuración de conexión**:
	- Edita el archivo `src/System/DB.php` para configurar tus credenciales de base de datos.

4. **Inicia el servidor**:
	- Usa el servidor web que prefieras (Apache, Nginx, etc.) para servir el proyecto.

## Uso

- Accede a la aplicación desde tu navegador en `http://localhost/sistema-bibliografico`.
- Puedes agregar, ver, editar y eliminar libros, autores y editoriales desde la interfaz.

## Estructura del Proyecto

```
/sistema-bibliografico
├── composer.json
├── database.db
├── database.sql
├── LICENSE.txt
├── public
│     └── index.php
├── src
│     ├── Controllers
│     │     ├── AuthorController.php
│     │     ├── BookController.php
│     │     ├── PublisherController.php
│     │     └── UserController.php
│     ├── Models
│     │     ├── AuthorBook.php
│     │     ├── Author.php
│     │     ├── Book.php
│     │     ├── Model.php
│     │     ├── Publisher.php
│     │     └── User.php
│     ├── routes.php
│     ├── System
│     │     ├── DB.php
│     │     └── Router.php
├── templates
│     ├── authors
│     │     ├── author_edit.php
│     │     ├── author.php
│     │     └── authors.php
│     ├── books
│     │     ├── book_edit.php
│     │     ├── book.php
│     │     └── books.php
│     ├── footer.php
│     ├── head.php
│     ├── inicio.php
│     ├── publishers
│     │     ├── publisher_edit.php
│     │     ├── publisher.php
│     │     └── publishers.php
│     ├── user_edit.php
│     └── users.php

```

## Buenas Prácticas

- Validaciones de datos en el lado del servidor y del cliente.
- Uso de prepared statements para prevenir inyecciones SQL.
- Código estructurado siguiendo el patrón MVC para una mejor mantenibilidad.

## Contribuciones

Las contribuciones son bienvenidas. Siéntete libre de enviar un pull request o abrir un issue para discutir mejoras.

## Licencia

Este proyecto está bajo la Licencia MIT. Puedes ver el archivo LICENSE para más detalles.

---

¡Espero que este sistema bibliográfico te sea útil y que disfrutes desarrollándolo! Si tienes alguna pregunta, no dudes en contactarme.