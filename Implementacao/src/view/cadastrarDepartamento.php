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
		<form action="../controller/C_Departamento.php" method="POST" id="cadastrar">
			<input type="hidden" name="acao" value="setDepartamento">
			<div class="item">
				<p>Nome:</p>
				<div class="divCampo">
					<input type="text" name="nome" class="form-control">
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
				<button type="submit" class="btn btn-info">Cadastrar</button>
			</div>
		</form>
	</div>
	<?php require_once("fimSidebar.php")?>
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
	});
	$("#cadastrar").submit(function(e)
	{
		e.preventDefault();
		let campoObrigatorioInvalido = false;
		$(".campo-obrigatorio").each(function()
		{
			if($(this).val().trim() == "")
			{
				if(!campoObrigatorioInvalido)
					$(this).focus();
				campoObrigatorioInvalido = true;
			}
		})
		if(campoObrigatorioInvalido)
		{
			Swal.fire({
				title: "Preencha todos os campos obrigatórios.",
				type: 'error',
				confirmButtonColor: '#0092be'
			});
			return;
		}
		let url = $(this).attr("action");
		let dados = $(this).serializeArray();
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
				});
			}
		});
	});
</script>
</html>