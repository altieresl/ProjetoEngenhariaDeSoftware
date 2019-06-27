<!DOCTYPE html>
<html>
<head>
	<title>Listar Consultas</title>
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
		<h1>Pesquisar consultas</h1>
		<form id="pesquisar" action="../controller/C_Consulta.php" method="GET">
			<input type="hidden" name="acao" value="consultar">
			<div class="item">
				<p>Médico:</p>
				<div class="divCampo">
					<select class="form-control" name="idMedico" id="medico">
						<option value="">Todos</option>
					</select>
				</div>
			</div>
			<div class="item">
				<p>Paciente:</p>
				<div class="divCampo">
					<select class="form-control" name="idPaciente" id="paciente">
						<option value="">Todos</option>
					</select>
				</div>
			</div>
			<div class="item">
				<p>Data inicial:</p>
				<div class="divCampo">
					<input type="datetime-local" name="dataInicial" class="form-control">
				</div>
			</div>
			<div class="item">
				<p>Data final:</p>
				<div class="divCampo">
					<input type="datetime-local" name="dataFinal" class="form-control">
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
		<h1>Listar consultas - <i class="fas fa-search" style="font-size:20px;cursor:pointer;" onclick="abrirFiltro();"></i></h1>
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
			</tbody>
		</table>
	</div>
	<?php require_once("fimSidebar.php")?>
</body>
<script type="text/javascript">
	$(document).ready(function()
	{
		let url = "../controller/C_Paciente.php";
		let dados = {
			acao: 'consultar'
		};
		$.ajax({
			url : url,
			data: dados,
			type: 'GET',
			dataType: 'JSON',
			success: function(pacientes)
			{
				pacientes.forEach(function(paciente)
				{
					$("#paciente").append("<option value='"+paciente.idPaciente+"'>"+paciente.nome+"</option>");
				})
			}
		});

		url = "../controller/C_Medico.php";
		dados = {
			acao: 'consultar'
		};
		$.ajax({
			url : url,
			data: dados,
			type: 'GET',
			dataType: 'JSON',
			success: function(medicos)
			{
				medicos.forEach(function(medico)
				{
					$("#medico").append("<option value='"+medico.idFuncionario+"'>"+medico.nome+"</option>");
				})
			}
		});
	});
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
			success: function(consultas)
			{
				consultas.forEach(function(consulta)
				{
					$(".tabelaVisao tbody").append("<tr>"+
						"<td>"+consulta.idConsulta+"</td>"+
						"<td>"+consulta.nomeMedico+"</td>"+
						"<td>"+consulta.nomePaciente+"</td>"+
						"<td>"+consulta.nomeClinica+"</td>"+
						"<td>"+consulta.data+"</td>"+
						"<td><center onclick='abrirPopup(\"alterarconsulta.php?idconsulta="+consulta.idconsulta+"\", 750, 550)' style='cursor:pointer;'><i class='fas fa-edit'></i></center></td>"+
						"<td><center style='cursor:pointer;' onclick='deletarConsulta("+consulta.idconsulta+")'><i class='fas fa-trash-alt'></i></center></td>"+
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
	function deletarConsulta(idFuncionario)
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