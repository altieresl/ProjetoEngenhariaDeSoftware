<!DOCTYPE html>
<html>
<head>
	<title>Listar Consultas</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
</head>
<body>
	<?php require_once("sidebar.php")?>
	<div class="container">
		<h1>Listar consultas</h1>
		<table class="tabelaVisao">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome médico</th>
					<th>Nome paciente</th>
					<th>Nome clínica</th>
					<th>Data</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>João</td>
					<td>Carlos</td>
					<td>Filial</td>
					<td>01/01/2019 12:00</td>
					<td><a href=""><center><i class="fas fa-edit"></i></center></a></td>
					<td><a href=""><center><i class="fas fa-trash-alt"></i></center></a></td>
				</tr>
				<tr>
					<td>2</td>
					<td>João</td>
					<td>Carlos</td>
					<td>Filial</td>
					<td>01/01/2019 12:00</td>
					<td><a href=""><center><i class="fas fa-edit"></i></center></a></td>
					<td><a href=""><center><i class="fas fa-trash-alt"></i></center></a></td>
				</tr>
				<tr>
					<td>3</td>
					<td>João</td>
					<td>Carlos</td>
					<td>Filial</td>
					<td>01/01/2019 12:00</td>
					<td><a href=""><center><i class="fas fa-edit"></i></center></a></td>
					<td><a href=""><center><i class="fas fa-trash-alt"></i></center></a></td>
				</tr>
				<tr>
					<td>4</td>
					<td>João</td>
					<td>Carlos</td>
					<td>Filial</td>
					<td>01/01/2019 12:00</td>
					<td><a href=""><center><i class="fas fa-edit"></i></center></a></td>
					<td><a href=""><center><i class="fas fa-trash-alt"></i></center></a></td>
				</tr>
				<tr>
					<td>5</td>
					<td>João</td>
					<td>Carlos</td>
					<td>Filial</td>
					<td>01/01/2019 12:00</td>
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