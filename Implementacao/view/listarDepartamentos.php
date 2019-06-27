<!DOCTYPE html>
<html>
<head>
	<title>Listar Departamentos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	<script src="js/sweetalert2@8.js"></script>
</head>
<body>
	<?php require_once("sidebar.php")?>
	<div class="container">
		<h1>Listar departamentos</h1>
		<table class="tabelaVisao">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Nome clínica</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Cardiologia</td>
					<td>Filial</td>
					<td><a href=""><center><i class="fas fa-edit"></i></center></a></td>
					<td><a href=""><center><i class="fas fa-trash-alt"></i></center></a></td>
				</tr>
				<tr>
					<td>2</td>
					<td>Cardiologia</td>
					<td>Filial</td>
					<td><a href=""><center><i class="fas fa-edit"></i></center></a></td>
					<td><a href=""><center><i class="fas fa-trash-alt"></i></center></a></td>
				</tr>
				<tr>
					<td>3</td>
					<td>Cardiologia</td>
					<td>Filial</td>
					<td><a href=""><center><i class="fas fa-edit"></i></center></a></td>
					<td><a href=""><center><i class="fas fa-trash-alt"></i></center></a></td>
				</tr>
				<tr>
					<td>4</td>
					<td>Cardiologia</td>
					<td>Filial</td>
					<td><a href=""><center><i class="fas fa-edit"></i></center></a></td>
					<td><a href=""><center><i class="fas fa-trash-alt"></i></center></a></td>
				</tr>
				<tr>
					<td>5</td>
					<td>Cardiologia</td>
					<td>Filial</td>
					<td><a href=""><center><i class="fas fa-edit"></i></center></a></td>
					<td><a href=""><center><i class="fas fa-trash-alt"></i></center></a></td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php require_once("fimSidebar.php")?>
</body>
<script type="text/javascript">
</script>
</html>