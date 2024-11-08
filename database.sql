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
);

INSERT INTO users(name, email, password, is_admin) VALUES('Daniel', 'daniel@caprice.lat', 'password', true);
INSERT INTO users(name, email, password, is_admin) VALUES('Daniel2', 'daniel2@caprice.lat', 'password', false);