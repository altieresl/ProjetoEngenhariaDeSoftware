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
		<h1>Preencha os dados da consulta</h1>
		<form id="cadastrar" method="POST" action="../controller/C_Consulta.php">
			<input type="hidden" name="acao" value="setConsulta">
			<div class="item">
				<p>Médico: <span class="obrigatorio">*</span></p>
				<div class="divCampo">
					<select class="form-control campo-obrigatorio" name="idMedico" id="medico">
					</select>
				</div>
			</div>
			<div class="item">
				<p>Paciente: <span class="obrigatorio">*</span></p>
				<div class="divCampo">
					<select class="form-control campo-obrigatorio" name="idPaciente" id="paciente">
					</select>
				</div>
			</div>
			<div class="item">
				<p>Clinica: <span class="obrigatorio">*</span></p>
				<div class="divCampo">
					<select class="form-control campo-obrigatorio" name="idClinica" id="clinica">
					</select>
				</div>
			</div>
			<div class="item">
				<p>Data: <span class="obrigatorio">*</span></p>
				<div class="divCampo">
					<input type="datetime-local" name="data" class="form-control campo-obrigatorio">
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

	url = "../controller/C_Clinica.php";
	dados = {
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