<!DOCTYPE html>
<html>
<head>
	<title>Listar Funcionários</title>
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
			padding:10px 0;
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
	<?php require_once("sidebar.php")?>
	<div class="filtro">
		<h1>Pesquisar funcionários</h1>
		<form id="pesquisar" action="../controller/C_Funcionario.php" method="GET">
			<input type="hidden" name="acao" value="consultar">
			<div class="item">
				<p>Nome:</p>
				<div class="entrada">
					<input type="text" class="form-control" name="nomeFuncionario" placeholder="Digite um nome para buscar">
				</div>
			</div>
			<div class="item">
				<p>Tipo de funcionário:</p>
				<div class="entrada">
					<select name="tipoFuncionario" id="tipoFuncionario" class="form-control campo-obrigatorio">
						<option value="-1">Todos</option>
						<option value="1">Médico</option>
						<option value="2">Enfermeiro</option>
						<option value="3">Técnico administrativo</option>
						<option value="4">Assistente de serviços gerais</option>
					</select>
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
		<h1>Listar funcionários - <i class="fas fa-search" style="font-size:20px;cursor:pointer;" onclick="abrirFiltro();"></i></h1>
		<table class="tabelaVisao">
			<thead>
				<tr>
					<th width="5%">Id</th>
					<th width="10%">Nome</th>
					<th width="10%">Salário</th>
					<th width="10%">Cargo</th>
					<th width="10%">Departamento</th>
					<th width="5%">Editar</th>
					<th width="5%">Excluir</th>
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
			success: function(funcionarios)
			{
				funcionarios.forEach(function(funcionario)
				{
					$(".tabelaVisao tbody").append("<tr>"+
						"<td>"+funcionario.idFuncionario+"</td>"+
						"<td>"+funcionario.nomeFuncionario+"</td>"+
						"<td>"+funcionario.salario+"</td>"+
						"<td>"+funcionario.tipoFuncionario+"</td>"+
						"<td>"+funcionario.nomeDepartamento+"</td>"+
						"<td><center onclick='abrirPopup(\"alterarFuncionario.php?idFuncionario="+funcionario.idFuncionario+"&codTipoFuncionario="+funcionario.codTipoFuncionario+"\", 700, 500)' style='cursor:pointer;'><i class='fas fa-edit'></i></center></td>"+
						"<td><center style='cursor:pointer;' onclick='deletarFuncionario("+funcionario.idFuncionario+")'><i class='fas fa-trash-alt'></i></center></td>"+
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
	function deletarFuncionario(idFuncionario)
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