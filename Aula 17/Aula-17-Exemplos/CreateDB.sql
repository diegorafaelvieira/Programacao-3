CREATE DATABASE aula16;
USE aula16;

CREATE TABLE Pessoa (
		id INTEGER AUTO_INCREMENT PRIMARY KEY,
		nome VARCHAR(20) NOT NULL,
		sobrenome VARCHAR(20) NOT NULL );

INSERT INTO Pessoa (nome,sobrenome)
		VALUES ('Carlos','Garcia');
INSERT INTO Pessoa (nome,sobrenome) 
		VALUES ('Maria','Antunes');
INSERT INTO Pessoa (nome,sobrenome)
		VALUES('Cassio','Silva');
INSERT INTO Pessoa (nome,sobrenome) 
		VALUES('Marcela','Moraes');
		
# Testar se o banco esta OK
SELECT * FROM Pessoa;