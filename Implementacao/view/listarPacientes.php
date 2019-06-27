<!DOCTYPE html>
<html>
<head>
	<title>Listar Pacientes</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	<script src="js/sweetalert2@8.js"></script>
	<style type="text/css">
	.filtro
	{
		background: #fff;
	    padding: 25px;
	    width: 66.5%;
	    height: auto;
	    margin: 5% 0;
	    margin-left: 30%;
	    border: 1px solid #b3b3b3;
	}
	.filtro p
	{
		width: 40%;
		display: inline-block;
	}
	.filtro .item
	{
		padding: 10px 0;
	}
	.filtro .entrada
	{
		width: 59%;
		display: inline-block;
	}
	.container
	{
		display: none;
	}
	</style>
</head>
<body>
	<?php require_once("sidebar.php");?>
	<div class="filtro">
		<h1>Pesquisar pacientes</h1>
		<form id="pesquisar" action="../controller/C_Paciente.php" method="GET">
			<input type="hidden" name="acao" value="consultar">
			<div class="item">
				<p>Nome:</p>
				<div class="entrada">
					<input type="text" class="form-control" name="nome" placeholder="Digite um nome para buscar">
				</div>
			</div>
			<div class="item">
				<p>Cpf:</p>
				<div class="entrada">
					<input type="text" class="form-control" name="cpf" placeholder="Digite um cpf para buscar">
				</div>
			</div>
			<div class="item">
				<div class="right">
					<button type="submit" class="btn btn-info">Pesquisar</button>
				</div>
			</div>
		</form>
	</div>
	<div class="container">
		<h1>Listar pacientes - <i class="fas fa-search" style="font-size:20px;cursor:pointer;" onclick="abrirFiltro();"></i></h1>
		<table class="tabelaVisao">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>CPF</th>
					<th>Endereço</th>
					<th>Data de Nascimento</th>
					<th>Plano</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<?php require_once("fimSidebar.php")?>
</body>
<script type="text/javascript">
	function abrirFiltro()
	{
		$(".container").hide();
		$(".filtro").show();
	}
	$("#pesquisar").submit(function(e)
	{
		e.preventDefault();
		$(".container").show();
		$(".filtro").hide();
		$(".tabelaVisao tbody").html("");
		let url = $(this).attr("action");
		let dados = $(this).serializeArray();
		$.ajax({
			url: url,
			data: dados,
			type: 'GET',
			dataType: 'JSON',
			success: function(pacientes)
			{
				pacientes.forEach(function(paciente)
				{
					$(".tabelaVisao tbody").append("<tr>"+
						"<td>"+paciente.idPaciente+"</td>"+
						"<td>"+paciente.nome+"</td>"+
						"<td>"+paciente.cpf+"</td>"+
						"<td>"+paciente.endereco+"</td>"+
						"<td>"+paciente.dataNascimento+"</td>"+
						"<td>"+paciente.nomePlano+"</td>"+
						"<td><center onclick='abrirPopup(\"alterarPaciente.php?idPaciente="+paciente.idPaciente+"\", 750, 550)' style='cursor:pointer;'><i class='fas fa-edit'></i></center></td>"+
						"<td><center style='cursor:pointer;' onclick='deletarPaciente("+paciente.idPaciente+")'><i class='fas fa-trash-alt'></i></center></td>"+
						"</tr>"
						);
				});
			}
		});
	});
	function abrirPopup(url, width, height)
	{
		var myWindow = window.open(url, "", "width="+width+",height="+height+",left="+((screen.width/2)-(width/2))+",top="+((screen.height/2)-(height/2)));
	}
	function deletarPaciente(idFuncionario)
	{
		Swal.fire({
			title: "Tem certeza que deseja realizar essa ação?",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#0092be',
			confirmButtonText: 'Sim',
			cancelButtonColor: '#c13131'
		}).then(function(res)
		{
			if(res.value)
			{
				let url = "../controller/C_Funcionario.php";
				let dados = {
					acao: "deletar",
					idFuncionario: idFuncionario
				};
				$.ajax({
					url : url,
					data: dados,
					type: 'POST',
					dataType: 'JSON',
					success: function(res)
					{
						Swal.fire({
							title: res.mensagem,
							type: (res.status) ? 'success' : 'error',
							confirmButtonColor: '#0092be'
						}).then(function()
						{
							window.location.reload();
						});
					}
				});
			}
		});
	}
</script>
</html>