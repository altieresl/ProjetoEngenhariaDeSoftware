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
		<h1>Preencha os dados do paciente</h1>
		<form action="../controller/C_Paciente.php" method="POST" id="alterar">
			<input type="hidden" name="acao" value="setPaciente">
			<input type="hidden" name="idPaciente" value="<?=$_GET['idPaciente']?>">
			<div class="item">
					<p>Nome: <span class="obrigatorio">*</span></p>
					<div class="divCampo">
						<input type="text" name="nome" id="nome" class="form-control campo-obrigatorio">
					</div>
				</div>
				<div class="item">
					<p>Cpf: <span class="obrigatorio">*</span></p>
					<div class="divCampo">
						<input type="text" name="cpf" id="cpf" class="form-control campo-obrigatorio">
					</div>
				</div>
				<div class="item">
					<p>Data de nascimento: <span class="obrigatorio">*</span></p>
					<div class="divCampo">
						<input type="date" name="dataNascimento"  id="dataNascimento" class="form-control campo-obrigatorio">
					</div>
				</div>
				<div class="item">
					<p>Endereço: <span class="obrigatorio">*</span></p>
					<div class="divCampo">
						<input type="text" name="endereco" id="endereco" class="form-control campo-obrigatorio">
					</div>
				</div>
				<div class="item">
					<p>Plano: <span class="obrigatorio">*</span></p>
					<div class="divCampo">
						<select name="plano" id="plano" class="form-control campo-obrigatorio">
							<?php
							require_once("../persistence/PlanosDao.class.php");
							$planos = PlanosDao::getPlanos();
							$htmlPlanos = "";
							while ($plano = $planos->fetch_object()):
							?>
							<option value='<?=$plano->idPlano?>'><?=utf8_encode($plano->nome)?></option>
							<?php endwhile; ?>
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
		url = "../controller/C_Paciente.php";
		dados = {
			acao: 'getInfoPaciente',
			idPaciente: <?=$_GET['idPaciente']?>
		};
		$.ajax({
			url : url,
			data: dados,
			type: 'GET',
			dataType: 'JSON',
			success: function(res)
			{
				$("#nome").val(res.nome);
				$("#cpf").val(res.cpf);
				$("#dataNascimento").val(res.dataNascimento);
				$("#endereco").val(res.endereco);
				$("#plano").val(res.idPlano);
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