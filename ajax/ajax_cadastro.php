<?php 
session_start();
require_once "../config.php";
$fase=$_REQUEST['fase'];

switch ($fase) {
	case 'email':
	$email=$_REQUEST['email'];
$sql="SELECT * FROM projecto.pro_user where pro_email='{$email}'";
 $result=$_con->query($sql);
 $resultado=mysqli_num_rows($result);
 if($resultado>0){
 	echo 1;
 }else{
 	echo 0;
 }
		# code...
		break;
	case 'user':

	$user=$_REQUEST['user'];
$sql="SELECT * FROM projecto.pro_user where pro_user='{$user}'";
 $result=$_con->query($sql);
 $resultado=mysqli_num_rows($result);
 if($resultado>0){
 	echo 1;
 }else{
 	echo 0;
 }

	break;
	
	case 'logar':

	$user=$_REQUEST['user'];
	$senha=$_REQUEST['senha'];

$senha1 = preg_replace('/[^[:alnum:]_]/', '',$senha);

	$senha=md5($senha1);
$sql="SELECT * from projecto.pro_user where pro_user='{$user}' and pro_senha='{$senha}'";

$result=$_con->query($sql);
$resultado=mysqli_num_rows($result);
if($resultado==1){
	echo 1;
	$_SESSION['user']=$user;
	$_SESSION['senha']=$senha;
}else{
	echo 0;
}

break;
case "novo_projeto";
$user=$_SESSION['user'];
	$sql="select id_user  from projecto.pro_user where pro_user='{$user}'";
	$result=$_con->query($sql);
	$linha=mysqli_fetch_assoc($result);
	$user=$linha['id_user'];
$nome=$_REQUEST['nome'];
$data_ini=$_REQUEST['data_ini'];
$data_fim=$_REQUEST['data_fim'];

$data_ini_2 = date("Y-m-d", strtotime($data_ini));
$data_fim_2 = date("Y-m-d", strtotime($data_fim));

$sql="Insert into projecto.pro_projeto (pro_nome,pro_inicio,pro_fim,id_user)values ('{$nome}','{$data_ini_2}','{$data_fim_2}',{$user})";

$result=$_con->query($sql);

if($result){
	echo 1;
}else{
	echo 0;
}

break;
 case "novo_objetivo":
$id=$_REQUEST['id'];
$nome=$_REQUEST['nome_obj'];
$data_ini=$_REQUEST['datepicker3'];
$data_fim=$_REQUEST['datepicker4'];

$data_ini_2 = date("Y-m-d", strtotime($data_ini));
$data_fim_2 = date("Y-m-d", strtotime($data_fim));
$sql="Insert  into  projecto.pro_objetivos (obj_nome,obj_inicio,obj_fim,id_projeto) values ('{$nome}','{$data_ini_2}','{$data_fim_2}',{$id})";

$result=$_con->query($sql);

if($result){
	echo 1;
}else{
	echo 0;
}

 break;

 case "exclui_projeto":
$id=$_REQUEST['id'];
$sql="delete from projecto.pro_projeto where id_projeto={$id}";
$result=$_con->query($sql);

$sql_1="delete from projecto.pro_objetivos where id_projeto={$id}";
$result_1=$_con->query($sql_1);

if($result && $result_1){
	echo 1;
}else{
	echo 0;
}

 break;
 case "conclui":
 $id=$_REQUEST['id'];
 $sql="select obj_feito from projecto.pro_objetivos where id_objetivo={$id}";


 $result=$_con->query($sql);
 $linha=mysqli_fetch_assoc($result);

$feito=$linha['obj_feito'];

if($feito=="N"){
	echo "N";
$sql2="Update projecto.pro_objetivos set obj_feito='S' where id_objetivo={$id}";
}else{
	echo "S";
$sql2="Update projecto.pro_objetivos set obj_feito='N' where id_objetivo={$id}";
}

$resul2=$_con->query($sql2);

break;
case "exclui_obj":
$id=$_REQUEST['id'];
$sql="delete from projecto.pro_objetivos where id_objetivo={$id}";

$result=$_con->query($sql);

if($result){
	echo 1;
}else{
	echo 0;
}

break;
case "conclui_projeto":
$id=$_REQUEST['id'];

$sql="update   projecto.pro_projeto set  pro_feito='S' where id_projeto={$id}";
$result=$_con->query($sql);



$sql="update  projecto.pro_objetivos set obj_feito='S' where id_projeto={$id}";
$result2=$_con->query($sql);

if($result && $result2){
	echo 1;
}else{
	echo 0;
}




break;

case "edit_projeto":
$id=$_REQUEST['id'];
$novo=$_REQUEST['novo'];

$sql="update projecto.pro_projeto set pro_nome='{$novo}' where id_projeto={$id}";
$result=$_con->query($sql);

if($result){
	echo 1;
}else{
	echo 0;
}

break;
	default:
		# code...
		break;
}

?>
