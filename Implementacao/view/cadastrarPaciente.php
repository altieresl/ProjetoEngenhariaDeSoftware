<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Paciente</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<style type="text/css">
		.caracteristicaEspecializacaoFuncionario
		{
			display: none;
		}
	</style>
</head>
<body>
	<?php require_once("sidebar.php")?>
		<div class="container">
			<h1>Preencha os dados do paciente</h1>
			<form id="cadastrar" method="POST" action="cadastrarPacienteInterface.php">
				<div class="item">
					<p>Nome:</p>
					<div class="divCampo">
						<input type="text" name="nome" class="form-control">
					</div>
				</div>
				<div class="item">
					<p>Data de nascimento:</p>
					<div class="divCampo">
						<input type="datetime-local" name="dataNascimento" class="form-control">
					</div>
				</div>
				<div class="item">
					<p>Naturalidade:</p>
					<div class="divCampo">
						<input type="text" name="naturalidade" class="form-control">
					</div>
				</div>
				<div class="item">
					<p>Telefone:</p>
					<div class="divCampo">
						<input type="text" name="telefone" class="form-control">
					</div>
				</div>
				<div class="item">
					<p>Plano:</p>
					<div class="divCampo">
						<select name="plano" class="form-control">
							<?php
							require_once("classes/dao/PlanosDao.class.php");
							$planos = PlanosDao::getPlanos();
							$htmlPlanos = "";
							while ($plano = $planos->fetch_object()):
							?>
							<option value='<?=$plano->cod?>'><?=$plano->nome?></option>
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
	Swal.fire({
	  title: 'Entrada inválida.',
	  type: 'warning',
	  // showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  // confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
	  if (result.value) {
	    Swal.fire(
	      'Deleted!',
	      'Your file has been deleted.',
	      'success'
	    )
	  }
	})
});

</script>
</html>