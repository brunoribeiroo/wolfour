<?php 
if(isset($_GET['user'])){
	$user=$_GET['user'];
}else{
	$user='';
}
if(isset($_GET['msg'])){
	if($_GET['msg']=='falha_login'){
		$msg="Falha  ao Logar. Tente novamente ou cadastre-se";
	}
}else{
	$msg='';
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
		<script type="text/javascript">

		function login(){

			user=document.getElementById('user_login').value;
			senha=document.getElementById('senha_login').value;
			fase="logar";
			var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4) {
 retorno=xhttp.responseText;

if (retorno==1) {
	
	location.href="generic.php";
	

}else{
	
	
alert("Falha ao Logar. Tente novamente ou cadastra-se");
	
}
}


    
  };
  xhttp.open("GET", "ajax/ajax_cadastro.php?user="+user+"&senha="+senha+"&fase="+fase, true);
  xhttp.send();

		}	


		</script>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><a href="index.php">Wolfour</a></h1>
				
			</header>

			

		<!-- Banner -->
			<section id="banner">
				
				<h2>Wolfour</h2>
				<p>Seus Projetos e Objetivos</p>
				<ul class="actions">
		
				</ul>
			</section>
	<section id="four" class="wrapper style2 special">
				<div class="inner">
					<header class="major narrow">
						<h2>Entrar </h2>
						<div id="mensagem"><h4><?php echo $msg; ?></h4></div>
						
					</header>

			
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
									<input name="user_login"  id="user_login" value='<?php echo $user; ?>' placeholder="Usuario" type="text" />
								</div>
								<div class="6u$ 12u$(xsmall)">
									<input name="senha_login" id="senha_login" placeholder="******" type="password" />
								</div>
								</div>
						</div>
						<ul class="actions">
							<input type="submit" onclick="login();" class="special" value="Entrar" />
							<input type="reset" class="alt" value="Limpar Campo" />
						</ul>
					
					<div class="inner">
					<header class="major narrow">
						<h2>Cadastrar-se  </h2>
						
					</header>

					<form action="login.php" method="POST">
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
									<input name="nome" placeholder="Nome" type="text" />
								</div>
								<div class="6u$ 12u$(xsmall)">
									<input name="email" placeholder="Email" type="email" />
								</div>
								</div>
						</div>
						<ul class="actions">
							<input type="submit" class="special" value="Cadastrar-Se" />
							<input type="reset" class="alt" value="Limpar Campo" />
							</form>
						</ul>
				
				</div>
			</section>
		
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
				
					<ul class="copyright">
						<li>Wolfour</li>
						
						<li>Edited: <a>Bruno Ribeiro</a>.</li>
						<li>Design: <a href="http://designscrazed.org/">TEMPLATE</a>.</li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>