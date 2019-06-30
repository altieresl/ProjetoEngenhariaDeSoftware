<!DOCTYPE html>
<html>
<head>
	<title>Alterar paciente</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
	<script src="js/sweetalert2@8.js"></script>
	<style type="text/css">
		.especifico
		{
			display: none;
		}
		.container
		{
			margin: auto;
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Preencha os dados da consulta</h1>
		<form action="../controller/C_Departamento.php" method="POST" id="alterar">
			<input type="hidden" name="idDepartamento" value="<?=$_GET['idDepartamento']?>">
			<input type="hidden" name="acao" value="setDepartamento">
			<div class="item">
				<p>Nome:</p>
				<div class="divCampo">
					<input type="text" name="nome" id="nome" class="form-control">
				</div>
			</div>
			<div class="item">
				<p>Clinica: <span class="obrigatorio">*</span></p>
				<div class="divCampo">
					<select class="form-control campo-obrigatorio" name="idClinica" id="clinica">
					</select>
				</div>
			</div>
			<div class="right">
				<button type="submit" class="btn btn-info">Alterar</button>
			</div>
		</form>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function()
	{
		let url = "../controller/C_Clinica.php";
		let dados = {
			acao: 'consultar'
		};
		$.ajax({
			url : url,
			data: dados,
			type: 'GET',
			dataType: 'JSON',
			success: function(clinicas)
			{
				clinicas.forEach(function(clinica)
				{
					$("#clinica").append("<option value='"+clinica.idClinica+"'>"+clinica.nome+"</option>");
				})
			}
		});

		url = "../controller/C_Departamento.php";
		dados = {
			acao: 'getInfoDepartamento',
			idDepartamento: <?=$_GET['idDepartamento']?>
		};
		$.ajax({
			url : url,
			data: dados,
			type: 'GET',
			dataType: 'JSON',
			success: function(res)
			{
				$("#nome").val(res.nome);
				$("#clinica").val(res.idClinica);
			}
		});

	});
	$("#alterar").submit(function(e)
	{
		e.preventDefault();
		let dados = $(this).serializeArray();
		let url = $(this).attr("action");
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
					opener.window.location.reload();
					window.close();
				});
			}
		});
	});
</script>
</html>