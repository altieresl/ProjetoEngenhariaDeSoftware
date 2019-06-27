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
		<h1>Preencha os dados do exame</h1>
		<form action="../controller/C_Exame.php" method="POST" id="alterar">
			<input type="hidden" name="idExame" value="<?=$_GET['idExame']?>">
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
					<input type="datetime-local" name="data" id="data" class="form-control campo-obrigatorio">
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
				<button type="submit" class="btn btn-info">Alterar</button>
			</div>
		</form>
	</div>
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

		url = "../controller/C_Exame.php";
		dados = {
			acao: 'getInfoExame',
			idExame: <?=$_GET['idExame']?>
		};
		$.ajax({
			url : url,
			data: dados,
			type: 'GET',
			dataType: 'JSON',
			success: function(res)
			{
				$("#tipo").val(res.tipo);
				$("#consulta").val(res.idConsulta);
				$("#data").val(res.data.replace(" ", "T"));
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