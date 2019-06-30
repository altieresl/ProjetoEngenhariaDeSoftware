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
		<form action="../controller/C_Consulta.php" method="POST" id="alterar">
			<input type="hidden" name="acao" value="setConsulta">
			<input type="hidden" name="idConsulta" value="<?=$_GET['idConsulta']?>">
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
					<input type="datetime-local" name="data" id="data" class="form-control campo-obrigatorio">
				</div>
			</div>
			<div class="right">
				<button type="submit" class="btn btn-info">Alterar</button>
			</div>
		</form>
	</div>
</body>
<script type="text/javascript">
	var pegouListaMedicos = false,
		pegouListaPacientes = false,
		pegouListaClinicas = false;
	$(document).ready(function()
	{
		getPacientesAjax();
		getMedicosAjax();
		getClinicasAjax();
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

	function verificaSeJaPegouTudoAjax()
	{
		return (pegouListaMedicos && pegouListaPacientes && pegouListaClinicas);
	}

	function getPacientesAjax()
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
				});
				pegouListaPacientes = true;
				if(verificaSeJaPegouTudoAjax())
					getInfoConsultaAjax();
			}
		});
	}

	function getMedicosAjax()
	{
		let url = "../controller/C_Medico.php";
		let dados = {
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
				});
				pegouListaMedicos = true;
				if(verificaSeJaPegouTudoAjax())
					getInfoConsultaAjax();
			}
		});
	}

	function getClinicasAjax()
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
				});
				pegouListaClinicas = true;
				if(verificaSeJaPegouTudoAjax())
					getInfoConsultaAjax();
			}
		});
	}

	function getInfoConsultaAjax()
	{
		url = "../controller/C_Consulta.php";
		dados = {
			acao: 'getInfoConsulta',
			idConsulta: <?=$_GET['idConsulta']?>
		};
		$.ajax({
			url : url,
			data: dados,
			type: 'GET',
			dataType: 'JSON',
			success: function(res)
			{
				$("#medico").val(res.idMedico);
				$("#paciente").val(res.idPaciente);
				$("#clinica").val(res.idClinica);
				$("#data").val(res.data.replace(" ", "T"));
			}
		});
	}
</script>
</html>