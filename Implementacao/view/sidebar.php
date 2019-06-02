<link href="https://fonts.googleapis.com/css?family=Merriweather:400,700,700i,900" rel="stylesheet">
<style type="text/css">
*
{
	transition: all 0.5s ease;
}
aside
{
	width: 20%;
	position: relative;
	top: 0;
	left: 0;
	background: #FFF;
	height: calc(100% - 150px);
	float: left;
}
header
{
	width:100%;
	height: 150px;
	background: #FFF;
	display: block;
	position: relative;
	top: 0;
	left: 0;
	padding: 15px 0;
}
aside nav a
{
	display:block;
	padding: 5px;
	background: #0092be;
	color: #FFF;
}
aside nav a:hover
{
	background: #FFF;
	color: #58abcb;
	text-decoration: none;
}
.subtopico
{
	background: #b3b3b3;
	padding:5px 10px;
	color: #FFF;
	text-align: right;
	width: 110%;
	margin-left: -5%;
}
#copyright
{
	text-align: center;
	font-size: 12px;
	padding: 5px;
}
.centralizado
{
	margin: auto;
	width: 1200px;
	position: relative;
}
@media only screen and (max-width: 1280px) {
	.centralizado
	{
		width: 1100px;
	}
}
@media only screen and (max-width: 1024px) {
	.centralizado
	{
		width: 920px;
	}
}
header nav
{
	width: 300px;
	position: absolute;
	right: 0;
	bottom: 5px;
}
header nav a
{
	background: #0092be;
	color: #FFF;
	padding: 5px 10px;
	text-decoration: none;
	border-bottom: 1px solid transparent;
}
header nav a:hover
{
	background: #EEE;
	color: #0092be;
	text-decoration: none;
	border-bottom: 1px solid #000;
}
.logo h1, .logo .textoLogo
{
	display: inline-block;
}
.logo h1
{
    font-size: 34px;
	font-family: 'Merriweather', serif;
	font-weight: 700;
}
.logo h6
{
	color: #b3b3b3;
	font-style: italic;
}
.logo .textoLogo
{
	position: absolute;
	bottom: 5px;
	margin-left: 10px;
}
</style>
<div class="centralizado">
<header>
	<div class="centralizado">
		<a href=".">
			<div class="logo">
				<img src="imgs/logo1.png" style="max-height: 110px">
				<div class="textoLogo">
					<h1>Rede Bem Estar</h1>
					<h6>Cuidando do seu bem mais precioso</h6>
				</div>
			</div>
			<!-- <img src="http://www.hospitaldabaleia.org.br/portal/images/logo.png"> -->
		</a>
		<nav>
			<a href="/">Página inicial</a>
			<a href="">Contato</a>
			<a href="">Sobre</a>
		</nav>
	</div>
</header>
<aside>
	<nav>
		<div class="subtopico">
			Funcionários
		</div>
		<a href="cadastrarFuncionario.php">Cadastrar Funcionário</a>
		<a href="listarFuncionarios.php">Listar Funcionários</a>
		<div class="subtopico">
			Pacientes
		</div>
		<a href="cadastrarPaciente.php">Cadastrar Paciente</a>
		<a href="listarPacientes.php">Listar Pacientes</a>
		<div class="subtopico">
			Consultas
		</div>
		<a href="marcarConsulta.php">Marcar Consulta</a>
		<a href="listarConsultas.php">Listar Consultas</a>
		<div class="subtopico">
			Clínicas
		</div>
		<a href="cadastrarClinica.php">Cadastrar Clínica</a>
		<a href="listarClinicas.php">Listar Clínicas</a>
		<div class="subtopico">
			Departamentos
		</div>
		<a href="cadastrarDepartamento.php">Cadastrar Departamento</a>
		<a href="listarDepartamentos.php">Listar Departamentos</a>

	</nav>
	<div id="copyright">
		Copyright 2019 &copy;
	</div>
</aside>