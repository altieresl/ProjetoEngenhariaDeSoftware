<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Departamento</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	<script src="js/sweetalert2@8.js"></script>
	<style type="text/css">
	</style>
</head>
<body>
	<?php require_once("sidebar.php")?>
	<div class="container">
		<h1>Preencha os dados do departamento</h1>
		<div class="item">
			<p>Nome:</p>
			<div class="divCampo">
				<input type="text" name="nome" class="form-control">
			</div>
		</div>
		<div class="right">
			<button type="submit" class="btn btn-info">Cadastrar</button>
		</div>
	</div>
	<?php require_once("fimSidebar.php")?>
</body>
<script type="text/javascript">
</script>
</html>