<?php 
session_start();

require_once 'config.php';
if(!$_SESSION['user'] && !$_SESSION['senha']){
header("Location:index.php?msg=falha_login");
}else{
	$user=$_SESSION['user'];
	$sql="select id_user  from projecto.pro_user where pro_user='{$user}'";
	$result=$_con->query($sql);
	$linha=mysqli_fetch_assoc($result);
	$id_user=$linha['id_user'];
}
function tira_diferenca($data) {
$partes = explode('/', $data);
return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);

}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Bem vindo ao Wolfour</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css" />
		<link href="assets/css/base/jquery-ui-1.9.2.custom.css" rel="stylesheet">
		<script src="assets/js/jquery-1.8.3.js"></script>
<script src="assets/js/jquery-ui-1.9.2.custom.js"></script>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">Wolfour</a></h1>
				<a href="logout.php">Sair</a>
			</header>

		
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major special">
						<h2>Bem vindo ao Wolfour</h2>
						<p>Crie objetivos e Projetos</p>
					</header>
<button id="botao_novo" onclick="novo_proj();">+Criar um novo Projeto</button>
<div id="formulario">
<span>Nome do Projeto</span>
<input type="text" name="nome_projeto" id="nome_projeto" >
<span>Data inicio</span>

<input type="text" name="datepicker" id="datepicker">

<span>Data Fim</span>
<input type="text" name="data_fim" onclick="data(this.id);" id="datepicker2">

<button id="bota_enviar" onclick="novo_proj_bd();">Enviar</button>
</div>

					<section id="one" class="wrapper style1">
					<center><div><h2>Projetos Pendentes</h2></div></center>

				<div class="inner">
				<?php 
				$sql="select * from pro_projeto where id_user={$id_user}  and pro_feito='N' order by id_projeto DESC";
				$result=$_con->query($sql);
				$resultado1=mysqli_num_rows($result);
if($resultado1>0){


				while ($linha=$result->fetch_assoc()) {
					$id_pro=$linha['id_projeto'];
					$nome=$linha['pro_nome'];
					$data_ini=$linha['pro_inicio'];
					$data_fim=$linha['pro_fim'];
					$feito=$linha['pro_feito'];


					?>
<article class="feature left">
						
						<div class="content">
							<table><tr><td><input  onchange="edit_projbd(<?php echo $id_pro;?>);" type="text" id="edita-<?php echo $id_pro;?>" value="<?php echo $nome;?>"   onchange="muda_nome(<?php echo $id_pro;?>)"  style="display:none"><div id="nome-<?php echo $id_pro;?>"><h2 ><?php echo $nome;?></h2></div></td><td ><a href="#" class="bt_excluir"  onclick="exclui_proj(<?php echo $id_pro;?>);">Excluir</a></td><td><img  alt="Editar Nome" onclick="edit_proj(<?php echo $id_pro; ?>);" width="25px" src="images/edit.png" ></td></tr></table>

							<p> <div class="6u$ 12u$(small)">
							<?php $sql1="select  * from pro_objetivos where id_projeto={$id_pro}";
						
										$result1=$_con->query($sql1);
										while ($linha1=$result1->fetch_assoc()) {
											$id_obj=$linha1['id_objetivo'];
											$nome_obj=$linha1['obj_nome'];
											$data_obj=$linha1['obj_inicio'];
											$data_obj_fim=$linha1['obj_fim'];
											$feito=$linha1['obj_feito'];
											if($feito=="S"){
												$nome_obj="<strike>$nome_obj</strike>";
												$check="checked";
											}else{
												$check="";

											}

$resultado=mysqli_num_rows($result1);
if($resultado>0){?>
	<div id="obj_div-<?php echo $id_obj; ?>" >
<table><tr><td><input type="checkbox" <?php echo $check; ?>   id="check-<?php echo $id_obj;?>" name="check-<?php echo $id_obj;?>" >
<label  onclick="conclui(<?php echo $id_obj;?>);" id="nome-<?php echo $id_obj;?>" for="check-<?php echo $id_obj;?>"><?php  echo $nome_obj;?></td><td><img  onclick="show(<?php echo $id_obj;?>);" id="bt-<?php echo $id_obj;?>" src="images/show_up.png"  width="25px"></td><td><img onclick="deleta_obj(<?php echo $id_obj?>)" src="images/trash.png" width="25px" ></td></tr></table>
</label>
<div style="display:none;" id="detalhe_obj-<?php echo $id_obj;?>" >
<?php  
$data_ini2=date("d/m/Y", strtotime($data_obj));
$data_fim2=date("d/m/Y", strtotime($data_obj_fim));
$dada_dif1=tira_diferenca($data_ini2);
$data_dif2=tira_diferenca($data_fim2);
$diferenca = $data_dif2-$dada_dif1;
$dias = (int)floor( $diferenca / (60 * 60 * 24));
echo "<table><tr><td></td><td></td><tr></table>";
echo "<label>Restam:".$dias." Dias";
echo "<label>Data de inicio :</label>".$data_ini2;
echo "<label>Data de Término :</label>".$data_fim2;?></p>


</div>
</div>

	<?php }else{?>
		<span>Nenhum Objetivo Criado</span>

	<?php }	}?>

									
										
										<br><br><button onclick="novo_objetivo('div-<?php echo $id_pro;?>');"  id="bt-novo">Novo Objetivo</button>
<div class="novo_objetivo" id="div-<?php echo $id_pro?>">
<span>Nome:</span>
<input type="text" name="nome_obj" id="nome_obj-<?php echo $id_pro;?>" >
<span>Data Inicio</span>
<input type="text" name="data_ini_obj" id="datepicker3-<?php echo $id_pro;?>" >
<span>Data Fim</span>
<input  type="text" name="data_fim_obj" id="datepicker4-<?php echo $id_pro;?>">
<button onclick="novo_objetivo_bd(<?php echo $id_pro ;?>,<?php echo $id_pro;?>);">Adicionar</button>

	 <script>

    $( "#datepicker3-<?php echo $id_pro;?>" ).datepicker({ minDate: 0 });

 $( "#datepicker4-<?php echo $id_pro;?>" ).datepicker({ minDate: +$("#datepicker3-"+<?php echo $id_pro;?>).val()});
  </script>

</div>

									</div><div  class="detalhe" id="detalhe-<?php echo $id_pro;?>"><?php 


									$data_ini2=date("d/m/Y", strtotime($data_ini));
									$data_fim2=date("d/m/Y", strtotime($data_fim));
									$dada_dif1=tira_diferenca($data_ini2);
									$data_dif2=tira_diferenca($data_fim2);
									$diferenca = $data_dif2-$dada_dif1;
									$dias = (int)floor( $diferenca / (60 * 60 * 24));
									echo "<table><tr><td></td><td></td><tr></table>";
									echo "<label>Restam:".$dias." Dias";
									echo "<label>Data de inicio :</label>".$data_ini2;
									echo "<label>Data de Término :</label>".$data_fim2;?></p>
									</div>
							<ul class="actions">
								<li>
									<a  onclick="detalhe(<?php echo $id_pro;?>);" class="button alt">Detalhes do Projeto</a>
									<a  onclick="conclui_projeto(<?php echo $id_pro;?>);" class="button alt">Concluir Projeto </a>
								</li>
							</ul>
						</div>
					</article>
				<?}?>
					
					
				</div>
			</section>
			 <?php }else{
 	echo "<center><span>Nenhum projeto criado pendente. Crie um !  </span></center>"; 
 }

 ?>
			  <script>
    $( "#datepicker" ).datepicker({ minDate: 0 });

 $( "#datepicker2" ).datepicker({ minDate: +$("#datepicker").val()});

 </script>
<center><div><h2>Projetos Concluidos</h2></div></center>
 <table>
 <tr><th> Nome do Projeto </th><th> Data de Inicio </th><th> Data de Término </th></tr>
 <?php 
 	$sql3="select * from pro_projeto where id_user={$id_user}  and pro_feito='S' order by id_projeto DESC";
				$result3=$_con->query($sql3);
				$resultado1=mysqli_num_rows($result3);
if($resultado1>0){


				while ($linha=$result3->fetch_assoc()) {
					$id_pro=$linha['id_projeto'];
					$nome=$linha['pro_nome'];
					$data_ini=$linha['pro_inicio'];
					$data_fim=$linha['pro_fim'];
					$feito=$linha['pro_feito'];
		$data_ini2=date("d/m/Y", strtotime($data_ini));
		$data_fim2=date("d/m/Y", strtotime($data_fim));
echo "<tr><td>$nome</td><td>$data_ini2</td><td>$data_fim2</td><tr>";

}
}else{
	echo "<center><span>Nenhum projeto concluido</span></center>";
}
					?>

					</table>

		<!-- Two -->
					<!-- Footer -->
			<footer id="footer">
				<div class="inner">
			
					<ul class="copyright">
						<li>&copy; Untitled.</li>						
						<li>Design: <a href="http://designscrazed.org/">TEMPLATE</a>.</li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>

			<script src="assets/js/main.js"></script>

	</body>
</html>