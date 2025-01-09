use system_authenticate_db;


CREATE TABLE usuarios(
id int primary key auto_increment,
email varchar(100) not null,
usuario varchar(100),
contrasenia varchar(100)
);

ALTER TABLE usuarios
ADD CONSTRAINT unique_email UNIQUE (email),
ADD CONSTRAINT unique_usuario UNIQUE (usuario);

SHOW tables;
describe usuarios;

SELECT * FROM usuarios;
