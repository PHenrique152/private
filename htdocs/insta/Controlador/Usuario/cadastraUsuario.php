<!DOCTYPE html>
<html>
<head>
  <title> Cadastro </title>
</head>
</html>

<?php

  $validar = array_map('trim', $_REQUEST);

  $validar = filter_var_array(
    $validar,
    [
    'nomePróprio' => FILTER_DEFAULT,

    'sobrenome' => FILTER_DEFAULT,

    'email' => FILTER_VALIDATE_EMAIL,

    'senha' => FILTER_DEFAULT,

    'confirmaSenha' => FILTER_DEFAULT,

    'dataNasc' => FILTER_DEFAULT,

    'alertasEmail' => FILTER_VALIDATE_BOOLEAN,

    'aceitaTermos' => FILTER_VALIDATE_BOOLEAN,

    'visibilidadePublicações' => FILTER_VALIDATE_INT


    ]
  );


$nomePróprio = $validar['nomePróprio'];
$sobrenome = $validar['sobrenome'];
$senha = $validar['senha'];
$confirmaSenha = $validar['confirmaSenha'];
$email = $validar['email'];
$dataNasc = $validar['dataNasc'];
$aceitaTermos = $validar['aceitaTermos'];
$visibilidade = $validar['visibilidadePublicações'];



if ($nomePróprio == false)
{
  echo "<p>Insira um nome.</p>";
}
else if (strlen($nomePróprio) < 3 || strlen($nomePróprio) > 35)
{
echo "<p>Quantidade de caracteres no nome inválido.</p>";
};

if ($sobrenome == false)
{
echo "<p>Insira um sobrenome.</p>";
}
else if (strlen($sobrenome) < 3 || strlen($sobrenome) > 35)
{
echo "<p>Quantidade de caracteres no sobrenome inválido.</p>";
};

if ($senha == false)
{
echo "<p>Insira uma senha.</p>";
}
else if (strlen($senha) < 6 || strlen($senha) > 12)
{
echo "<p>Senha inválida (deve ter no mínimo 6 caracteres e no máximo 12).</p>";
};

if ($confirmaSenha == false)
{
echo "<p>Confirme sua senha.</p>";
}
else if ($confirmaSenha != $senha)
{
echo "<p>As senhas devem ser iguais.</p>";
};

if ($email == false)
{
echo "<p>Insira um e-mail válido.</p>";
};

if ($dataNasc == false)
{
echo "<p>Insira uma data de nascimento</p>";
}
else
{

$data = DateTime:: createFromFormat('Y-m-d', $dataNasc);

$hoje = new DateTime();

$dif = $data->diff($hoje);

$anos = $dif->y;

if($anos < 16)
{
    echo "<p> Você deve ter, no mínimo, 16 anos para prosseguir.</p>";
};

}


if ($aceitaTermos == false)
{
echo "<p>É necessário aceitar os termos de uso para prosseguir.</p>";
};

if ($visibilidade == false)
{
  echo "<p>Escolha quem poderá ver suas publicações.</p>";
}
else if ($visibilidade != 1 && $visibilidade != 2 && $visibilidade != 3)
{
  echo "<p>Opção não encontrada.</p>";
};

 ?>
