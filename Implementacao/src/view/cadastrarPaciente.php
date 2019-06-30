<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Paciente</title>
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
			<h1>Preencha os dados do paciente</h1>
			<form id="cadastrar" method="POST" action="../controller/C_Paciente.php">
				<input type="hidden" name="acao" value="setPaciente">
				<div class="item">
					<p>Nome: <span class="obrigatorio">*</span></p>
					<div class="divCampo">
						<input type="text" name="nome" class="form-control campo-obrigatorio">
					</div>
				</div>
				<div class="item">
					<p>Cpf: <span class="obrigatorio">*</span></p>
					<div class="divCampo">
						<input type="text" name="cpf" class="form-control campo-obrigatorio">
					</div>
				</div>
				<div class="item">
					<p>Data de nascimento: <span class="obrigatorio">*</span></p>
					<div class="divCampo">
						<input type="date" name="dataNascimento" class="form-control campo-obrigatorio">
					</div>
				</div>
				<div class="item">
					<p>Endereço: <span class="obrigatorio">*</span></p>
					<div class="divCampo">
						<input type="text" name="endereco" class="form-control campo-obrigatorio">
					</div>
				</div>
				<div class="item">
					<p>Plano: <span class="obrigatorio">*</span></p>
					<div class="divCampo">
						<select name="plano" class="form-control campo-obrigatorio">
							<?php
							require_once("../persistence/PlanosDao.class.php");
							$planos = PlanosDao::getPlanos();
							$htmlPlanos = "";
							while ($plano = $planos->fetch_object()):
							?>
							<option value='<?=$plano->idPlano?>'><?=$plano->nome?></option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
				<div class="right">
					<button type="submit" class="btn btn-info" id="cadastrar">Cadastrar</button>
				</div>
			</form>
		</div>
		<?php require_once("fimSidebar.php")?>
</body>
<script type="text/javascript">
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