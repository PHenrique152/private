<?php

$bd = new PDO('mysql:host=localhost;dbname=agendacontatos;charset=utf8',
'AgendaContatos',
'123456789');

$bd->setAttribute(PDO::ATTR_ERRMODE,
                  PDO::ERRMODE_EXCEPTION);

$sql = 'CREATE TABLE contatos(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255) NOT NULL UNIQUE,
  dataNasc DATE,
  tel VARCHAR (50),
  email VARCHAR (255)
)';

//$bd->exec($sql);

$bd->exec (
"INSERT INTO contatos (nome, tel, email, dataNasc) VALUES
('Ana Claro', '+55 (21) 2222-2222', 'ana@exaple.net','1998-02-01'),
('Ricardo', '+55 (226) 2222-2222', 'ana@exaple.net','1998-02-01'),
('Dalva', '+55 (21) 2222-2222', 'ana@exaple.net','1998-02-01')"
);


echo "Concluído";

?>
