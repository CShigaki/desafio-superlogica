USE superlogica;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    nome VARCHAR(256) NOT NULL
);

CREATE TABLE info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    genero VARCHAR(1) NOT NULL,
    ano_nascimento INT NOT NULL,
    FOREIGN KEY (cpf) REFERENCES usuario (cpf)
);

INSERT INTO usuario (cpf, nome) VALUES ('16798125050', 'Luke Skywalker');
INSERT INTO usuario (cpf, nome) VALUES ('59875804045', 'Bruce Wayne');
INSERT INTO usuario (cpf, nome) VALUES ('04707649025', 'Diane Prince');
INSERT INTO usuario (cpf, nome) VALUES ('21142450040', 'Bruce Banner');
INSERT INTO usuario (cpf, nome) VALUES ('83257946074', 'Harley Quinn');
INSERT INTO usuario (cpf, nome) VALUES ('07583509025', 'Peter Parker');

INSERT INTO info (cpf, genero, ano_nascimento) VALUES ('16798125050', 'M', 1976);
INSERT INTO info (cpf, genero, ano_nascimento) VALUES ('59875804045', 'M', 1960);
INSERT INTO info (cpf, genero, ano_nascimento) VALUES ('04707649025', 'F', 1988);
INSERT INTO info (cpf, genero, ano_nascimento) VALUES ('21142450040', 'M', 1954);
INSERT INTO info (cpf, genero, ano_nascimento) VALUES ('83257946074', 'F', 1970);
INSERT INTO info (cpf, genero, ano_nascimento) VALUES ('07583509025', 'M', 1972);

SELECT
       CONCAT(u.nome, ' - ' ,f.genero) AS usuario,
       IF (50 > YEAR(CURRENT_DATE()) - f.ano_nascimento, "NÃO", "SIM") AS maior_50_anos  FROM info f
INNER JOIN usuario u ON u.cpf = f.cpf
WHERE u.id IN (6, 1, 4)
ORDER BY maior_50_anos;

