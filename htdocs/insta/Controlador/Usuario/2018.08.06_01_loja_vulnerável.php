<?php
	const preçosSabores = [
		'SMAO' => 18.30,
		'FNGO' => 15.00,
		'CRNE' => 17.30,
		'ATUM' => 15.00,
		'CORD' => 16.50
	];

	function calculaValorFrete(string $cep)
	{
		return rand(5, 15);
	}

	$total = null;

	if (empty($_REQUEST) == false)
	{
		$qtde = $_REQUEST['qtde'];

		$sabor = $_REQUEST['sabor'];

		$preçoUnitário = preçosSabores[$sabor];

		$cep = $_REQUEST['cep'];
		$preçoFrete = calculaValorFrete($cep);

		$email = $_REQUEST['email'];

		$total = $preçoUnitário * $qtde + $preçoFrete;
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>LP3 - Validação de dados: Loja</title>
</head>
<body>
	<h1>Loja</h1>

	<h2>Ração seca para Gatos</h2>
	<p>Pacote com 1kg</p>

	<form method="POST">
		<input name="qtde" required type="text" placeholder="Qtde."/> (máx. 10 unid.)<br/>

		<fieldset>
			<legend>Sabor:</legend>
			<label><input name="sabor" required type="radio" value="SMAO"> Salmão (R$ 18,30)</label></br>
			<label><input name="sabor" required type="radio" value="FNGO"> Frango (R$ 15,00)</label></br>
			<label><input name="sabor" required type="radio" value="CRNE"> Carne (R$ 17,30)</label></br>
			<label><input name="sabor" required type="radio" value="ATUM"> Atum (R$ 15,00)</label></br>
			<label><input name="sabor" required type="radio" value="CORD"> Cordeiro (R$ 16,50)</label></br>
		</fieldset>

		<input name="cep" required type="text" placeholder="CEP"/></br>
		<input name="email" required type="text" placeholder="E-mail"/></br>

		<input type="submit" value="Fazer pedido"/>
	</form>

	<?php if ($total != null) { ?>
		<div style="background-color: LightGrey">
			<p>Total: <strong>R$ <?= $total ?></strong></p>
			<p>CEP de entrega: <strong><?= $cep ?></strong></p>
			<p>A nota fiscal eletrônica será enviada em até 24h para <strong><?= $email ?></strong>.</p>
		</div>
	<?php } ?>
</body>
</html>
