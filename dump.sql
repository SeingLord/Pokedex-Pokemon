CREATE TABLE pokemons (id int auto_increment primary key,
	name varchar(250),
    url varchar(250),
    type varchar(50),
    body text
    
    )

create table users (id int primary key auto_increment, 
		name varchar(50),
		email varchar(255), 
        password varchar(255),
        created DATETIME,
        updated DATETIME
    )

CREATE TABLE types (
    id int primary key auto_increment,
    type varchar(10)
);

INSERT INTO types (type) VALUES ('Normal');
INSERT INTO types (type) VALUES ('Fogo');
INSERT INTO types (type) VALUES ('Água');
INSERT INTO types (type) VALUES ('Eletrico');
INSERT INTO types (type) VALUES ('Grama');
INSERT INTO types (type) VALUES ('Gelo');
INSERT INTO types (type) VALUES ('Lutador');
INSERT INTO types (type) VALUES ('Venonoso');
INSERT INTO types (type) VALUES ('Terra');
INSERT INTO types (type) VALUES ('Voador');
INSERT INTO types (type) VALUES ('Psíquico');
INSERT INTO types (type) VALUES ('Iseto');
INSERT INTO types (type) VALUES ('Pedra');
INSERT INTO types (type) VALUES ('Fantasma');
INSERT INTO types (type) VALUES ('Dragão');
INSERT INTO types (type) VALUES ('Sombrio');
INSERT INTO types (type) VALUES ('Aço');
INSERT INTO types (type) VALUES ('Fada');