<!DOCTYPE html>
<html>
<head>
	<title>Alterar Funcionário</title>
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
		<h1>Preencha os dados do funcionário</h1>
		<form action="../controller/C_Funcionario.php" method="POST" id="formFuncionario">
			<input type="hidden" name="acao" value="setFuncionario">
			<input type="hidden" name="idFuncionario" value="<?=$_GET['idFuncionario']?>">
			<input type="hidden" name="tipoFuncionario" value="<?=$_GET['codTipoFuncionario']?>">
			<div class="item">
				<p>Nome:</p>
				<div class="divCampo">
					<input type="text" name="nome" id="nome" class="form-control campo-obrigatorio">
				</div>
			</div>
			<div class="item">
				<p>Salário:</p>
				<div class="divCampo">
					<input type="number" name="salario" id="salario" class="form-control campo-obrigatorio">
				</div>
			</div>
			<div class="item">
				<p>Departamento:</p>
				<div class="divCampo">
					<select name="idDepartamento" id="idDepartamento" class="form-control campo-obrigatorio">
						
					</select>
				</div>
			</div>
			<div class="item">
				<p>Tipo de funcionário:</p>
				<div class="divCampo">
					<select name="tipoFuncionario" id="tipoFuncionario" class="form-control campo-obrigatorio" disabled>
						<option>Selecione</option>
						<option value="1">Médico</option>
						<option value="2">Enfermeiro</option>
						<option value="3">Técnico administrativo</option>
						<option value="4">Assistente de serviços gerais</option>
					</select>
				</div>
			</div>
			<div class="item especifico especificoMedico">
				<p>Especialização:</p>
				<div class="divCampo">
					<select name="especializacao" id="especializacao" class="form-control">
						<option value="1">Cardiologia</option>
						<option value="2">Dermatologia</option>
						<option value="3">Ortopedia</option>
						<option value="4">Anestesiologia</option>
					</select>
				</div>
			</div>
			<div class="item especifico especificoAssistenteServicosGerais">
				<p>Função:</p>
				<div class="divCampo">
					<select name="funcao" id="funcao" class="form-control">
						<option value="Faxineiro">Faxineiro</option>
					</select>
				</div>
			</div>
			<div class="item especifico especificoEnfermeiro">
				<p>Ala:</p>
				<div class="divCampo">
					<select name="ala" id="ala" class="form-control">
						<option value="Sul">Sul</option>
						<option value="Norte">Norte</option>
					</select>
				</div>
			</div>
			<div class="item especifico especificoTecnicoAdministrativo">
				<p>Setor:</p>
				<div class="divCampo">
					<select name="setor" id="setor" class="form-control">
						<option value="Secretaria">Secretaria</option>
						<option value="Diretoria">Diretoria</option>
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
	$("#tipoFuncionario").change(function()
	{
		atualizarTipoFuncionario($(this).val());
	});
	function atualizarTipoFuncionario(tipo)
	{
		let codTipoFuncionario = parseInt(tipo);
		$(".especifico").css('display','none');
		switch(codTipoFuncionario)
		{
			case 1:
				$(".especificoMedico").css('display','inline-block');
				break;
			case 2:
				$(".especificoEnfermeiro").css('display','inline-block');
				break;
			case 3:
				$(".especificoTecnicoAdministrativo").css('display','inline-block');
				break;
			case 4:
				$(".especificoAssistenteServicosGerais").css('display','inline-block');
				break;
			default:
				break;
		}
	}
	$(document).ready(function()
	{
		let url = "../controller/C_Departamento.php";
		let dados = {
			acao: "getDepartamentos"
		}
		$.ajax({
			url: url,
			data: dados,
			type: "GET",
			dataType: "JSON",
			success: function(res)
			{
				let htmlAux = "";
				res.forEach(function(element)
				{
					htmlAux += "<option value='"+element.idDepartamento+"'>"+element.nome+"</option>";
				});
				$("#idDepartamento").html(htmlAux);
				url = "../controller/C_Funcionario.php";
				dados = {
					acao: 'getInfoFuncionario',
					idFuncionario: <?=$_GET['idFuncionario']?>,
					tipoFuncionario: <?=$_GET['codTipoFuncionario']?>,
				};
				$.ajax({
					url : url,
					data: dados,
					type: 'GET',
					dataType: 'JSON',
					success: function(res)
					{
						atualizarTipoFuncionario(res.tipoFuncionario);
						$("#nome").val(res.nomeFuncionario);
						$("#salario").val(res.salario);
						$("#idDepartamento").val(res.idDepartamento);
						$("#tipoFuncionario").val(res.tipoFuncionario);
						$("#especializacao").val(res.especializacao_medico);
						$("#ala").val(res.ala_enfermeiro);
						$("#setor").val(res.setor_tecnico);
						$("#funcao").val(res.funcao_assistente);
					}
				});
			}
		});
	});
	$("#formFuncionario").submit(function(e)
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