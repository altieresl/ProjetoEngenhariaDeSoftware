<!DOCTYPE html>
<html>
<head>
<title>Suporte</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Hind+Siliguri" rel="stylesheet">
<script type="text/javascript" src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
<style type="text/css">
*
{
	webkit-transition: all 0.1s;
	transition: all 0.1s ease-in;
}
body
{
	background: #FFF;
}
a:hover
{
	text-decoration: none;
}
a
{
	color: #0092be;
}
#container
{
	position: fixed;
	-webkit-border-top-left-radius: 5px;
	-webkit-border-top-right-radius: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	border: 1px solid #eee;
	text-align: center;
	background: #FFF;
	width: 400px;
	height: 500px;
	top: 50%;
	left: 50%;
	margin-top: -250px;
	margin-left: -200px;
	padding: 10px;
}
#container h3
{
	color: #404040;
    font-family: 'Segoe Ui','Hind Siliguri', sans-serif;
    margin: 10px 0 20px 0;
}

#container input
{
	width: 70%;
	margin: auto;
	border: 1px solid #0092be;
	margin-bottom: 10px;
}
#container input:focus
{
	box-shadow: none;
	border: 3px solid #0092be;
}
.loginLabel, .senhaLabel
{
	display: block;
	margin: 0;
	height: 16px;
    line-height: 8px;
	position: relative;
	width: 30px;
	top: -57px;
	opacity: 0;
	font-size: 9px;
	left: 20%;
	background: #FFF;
	outline: 0 0 0 0.2rem rgba(0,123,255,.25);
	padding:3px;
}
#login:focus + .loginLabel, #senha:focus + .senhaLabel
{
	opacity: 1;
}
#container .botao
{
	background: #0092be;
	display: block;
	width: 40%;
	margin: auto;
	color: #FFF;
	border: 0;
	padding: 5px 10px;
	cursor: pointer;
	border: 3px solid transparent;
}
#container .botao:focus
{
	border: 3px solid #6cb4f7;
}
#container .inferior
{
	position: absolute;
	bottom: 0;
	right: 0;
	width: 100%;
}

.ret
{
	display: none;
	color: #ff2f00;
	margin-top: 10px;
}
</style>
</head>
<body>
	<div id='container'>
		<img src="imgs/logo3.png" style="max-width: 380px;margin-bottom: 10px;">
		<h3 style="margin-bottom:10px;">Bem vindo(a)</h3>
		<form id='formulario' method="POST" action="especialista_interface.php">
			<input type="hidden" name="acao" value='logar'>
			<input type='text' class='form-control' name='loginzzz' placeholder="Login" id='login'>
			<label class="loginLabel" for='login'>Login</label>
			<input type='password' class='form-control' name='senha' placeholder="Senha" id='senha'>
			<label class="senhaLabel" for='senha'>Senha</label>
			<button class='botao'>Entrar</button>
		</form>
		<h6 class='retLog ret'>Combinação de usuário e senha incorreta.</h6>
		<div class='inferior'>
			<p class='info'>
			<a href='criar_conta.php'>Esqueci minha senha</a>
			</p>
		</div>
	</div>
</body>
<script type="text/javascript">
	$("#login").focus();
	$("#formulario").submit(function(event)
	{
		$(".ret").hide();
		var url = $(this).attr("action");
		var method = $(this).attr("method");
		var data = $(this).serializeArray();
		$.ajax({
				url: url,
				method: method,
				type: method,
				data: data,
				dataType: "json",
				success: function(res)
				{
					if(res.status == "success")
					{
						window.location.href = "home.php";
					}else
					{
						$(".retLog").show();
					}
				}
			})
		event.preventDefault();
	})
</script>
</html>