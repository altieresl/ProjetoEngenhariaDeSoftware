<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Funcionário</title>
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
		<h1>Preencha os dados do exame</h1>
		<form id="cadastrar" method="POST" action="../controller/C_Exame.php">
			<input type="hidden" name="acao" value="setExame">
			<div class="item">
				<p>Tipo: <span class="obrigatorio">*</span></p>
				<div class="divCampo">
					<input type="text" class="form-control campo-obrigatorio" name="tipo" id="tipo">
				</div>
			</div>
			<div class="item">
				<p>Data: <span class="obrigatorio">*</span></p>
				<div class="divCampo">
					<input type="datetime-local" name="data" class="form-control campo-obrigatorio">
				</div>
			</div>
			<div class="item">
				<p>Consulta: <span class="obrigatorio">*</span></p>
				<div class="divCampo">
					<select class="form-control campo-obrigatorio" name="idConsulta" id="consulta">
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
	let url = "../controller/C_Consulta.php";
	let dados = {
		acao: 'consultar'
	};
	$.ajax({
		url : url,
		data: dados,
		type: 'GET',
		dataType: 'JSON',
		success: function(consultas)
		{
			consultas.forEach(function(consulta)
			{
				$("#consulta").append("<option value='"+consulta.idConsulta+"'>"+consulta.idConsulta+" - "+consulta.nomeMedico+" - "+consulta.nomePaciente+" - "+consulta.data+"</option>");
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