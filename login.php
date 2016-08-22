<?php

require_once 'config.php';

if(isset($_POST['nome']) && isset($_POST['email'])){
$nome=$_POST['nome'];
$email=$_POST['email'];

}else{
	$nome='';
	$email='';
}

if(isset($_POST['user'])){
$user=$_POST['user'];
$senha=$_POST['senha'];

$senha=md5($senha);
	
}

if(isset($_POST['nao_passa']) && $_POST['nao_passa']==1){
	echo "<script>alert('Cadastro com usuarios incorretos')</script>";

}elseif(empty($user) || empty($senha) || empty($email) || empty($nome)){
  echo "<script>alert('Dados  incorretos ');</script>";

}
else{
		$sql="Insert into projecto.pro_user (pro_nome,pro_user,pro_senha,pro_email) values('{$nome}','{$user}','{$senha}','{$email}')";
	$result=$_con->query($sql);
	if($result){
		//echo "<script>window.location.href='index.php?email='+$user+'&senha='+$senha</script>";
		header("Location: index.php?user={$user}");
	}else{
		echo "Erro--".$sql;
	}
}





?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Wolfour</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<script>
		
		function verifica_email(){
			email=document.getElementById('email').value;
			fase="email";
			var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4) {
 retorno=xhttp.responseText;
 div= document.getElementById('verifica_email');
if(retorno==0){
	texto="Email Disponivel";
	document.getElementById('enviar').style.display='';
}else{
	texto="Email  ja existente. Faça o Login";
	document.getElementById('enviar').style.display='none';
	document.getElementById('nao_passa').value=1;

}
div.innerHTML=texto;

    }
  };
  xhttp.open("GET", "ajax/ajax_cadastro.php?email="+email+"&fase="+fase, true);
  xhttp.send();

		}


		function verifica_user(){
			user=document.getElementById('user').value;
			fase="user";
			var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4) {
 retorno=xhttp.responseText;
 div= document.getElementById('verifica_user');
if(retorno==0){
	texto="Usuario Disponivel";
	document.getElementById('enviar').style.display='';
}else{
	texto="Usuario  ja existente. Faça o Login";
	document.getElementById('enviar').style.display='none';
	document.getElementById('nao_passa').value=1;

}
div.innerHTML=texto;

    }
  };
  xhttp.open("GET", "ajax/ajax_cadastro.php?user="+user+"&fase="+fase, true);
  xhttp.send();

		}
	</script>
	</head>

	<body>
			<section id="four" class="wrapper style2 special">
				<div class="inner">
					<header class="major narrow">
						<h2>Cadastre-se</h2>
						
					</header>

					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
									<input name="nome" value="<?php echo $nome ;?>" placeholder="Nome" type="text" />
									<br>
									<input onchange="verifica_email()" id="email" name="email" value="<?php echo $email ?>" placeholder="Email" type="email" /><div id="verifica_email" >
									</div>
									<input type='hidden' id='nao_passa' value=0 />
									<br>
									<input name="user" id="user" onchange="verifica_user()" placeholder="Usuario" type="text" />
									<div id="verifica_user" >
									</div>
									<br>
									<input name="senha" placeholder="Senha" type="password" />
									<br>
							

								</div>
								
								</div>
						</div>
						<ul class="actions">
							<li><input type="submit"  id="enviar" class="special" value="Enviar" /></li>
							<li><input type="reset" class="alt" value="Reset" /></li>
						</ul>
					</form>
					
			</section>
	</body>