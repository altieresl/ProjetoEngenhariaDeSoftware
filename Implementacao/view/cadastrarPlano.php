<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Funcionário</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
	<style type="text/css">
	</style>
</head>
<body>
	<?php require_once("sidebar.php")?>
	<div class="container">
		<h1>Preencha os dados do plano</h1>
		<div class="item">
			<p>Nome:</p>
			<div class="divCampo">
				<input type="text" name="nome" class="form-control">
			</div>
		</div>
		<div class="item">
			<p>Preço:</p>
			<div class="divCampo">
				<input type="number" name="salario" class="form-control">
			</div>
		</div>
		<button type="submit" class="btn btn-info">Cadastrar</button>
	</div>
	<?php require_once("fimSidebar.php")?>
</body>
<script type="text/javascript">
</script>
</html>