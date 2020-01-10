# crear tablas sqlite
sqlite3 liquor.db

CREATE TABLE tbl_categoria (
 id INTEGER PRIMARY KEY,
 detalle TEXT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS tbl_marca (
 id INTEGER PRIMARY KEY,
 detalle TEXT NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS tbl_usuario (
	id INTEGER PRIMARY KEY,
	username VARCHAR(50) NOT NULL UNIQUE,
	email VARCHAR(100),
	password CHAR(255),
	fecha date,
	rol CHAR(1)
	);

CREATE TABLE IF NOT EXISTS tbl_producto (
 id INTEGER PRIMARY KEY,
 codigo TEXT NOT NULL UNIQUE,
 detalle TEXT NOT NULL UNIQUE,
 unidades 	REAL DEFAULT 1,
 precio_compra 	REAL DEFAULT 0,
 precio_venta_pormayor 	REAL DEFAULT 0,
 precio_venta_unidad 	REAL DEFAULT 0,
 descuento 	REAL DEFAULT 0,
 url TEXT,
 id_categoria INTEGER,
 id_marca INTEGER,
 FOREIGN KEY (id_categoria) REFERENCES tbl_categoria (id),
 FOREIGN KEY (id_marca) REFERENCES tbl_marca (id)
);

alter table tbl_producto add column url char(200);


