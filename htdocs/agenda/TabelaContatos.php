<?php

function CriaConexaoBd()
{
  $bd = new PDO('mysql:host=localhost;dbname=agendacontatos;charset=utf8',
  'AgendaContatos',
  '123456789');

  $bd->setAttribute(PDO::ATTR_ERRMODE,
                  PDO::ERRMODE_EXCEPTION);

  return $bd;
}

function ListaContatos()
{

  $bd =CriaConexaoBd();

  $resultados = $bd->query('SELECT * FROM contatos');

  return $resultados->fetchAll();

}
?>
