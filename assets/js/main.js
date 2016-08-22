/*
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
*/
			function novo_proj(){
				
				div=document.getElementById('formulario');
				if(div.style.display=='block'){
					div.style.display='none';
					document.getElementById('botao_novo').innerHTML="+Criar um novo Projeto";
				}else{
				div.style.display='block';
				document.getElementById('botao_novo').innerHTML="-Esconder";
					
				}


			}
			function novo_proj_bd(){

				fase="novo_projeto";
				nome=document.getElementById('nome_projeto').value;
				data_ini=$("#datepicker").val();

				data_fim=$("#datepicker2").val();

				if(nome !='' && data_ini!='' && data_fim !=''){



	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4) {
 retorno=xhttp.responseText;
if (retorno==1) {
	nome='';
	data_ini='';
	data_fim='';
	novo_proj();
	location.reload();
}else{
	alert("vamos tentar");
}
}
    
  };
  xhttp.open("GET", "ajax/ajax_cadastro.php?fase="+fase+"&nome="+nome+"&data_ini="+data_ini+"&data_fim="+data_fim, true);

  xhttp.send();
}else{
	alert("Preencha os Dados Corretamente");
}
			}

function novo_objetivo(div){


	div=document.getElementById(div);
				
			
				if(div.style.display=='block'){
					div.style.display='none';
					document.getElementById('bt-novo').innerHTML="Novo Objetivo";
				}else{
				div.style.display='block';
				document.getElementById('bt-novo').innerHTML="-Esconder";
					
				}
}

function novo_objetivo_bd(id,id_obj){
fase="novo_objetivo";
nome_obj=document.getElementById('nome_obj-'+id_obj).value;
datepicker3=document.getElementById('datepicker3-'+id_obj).value;
datepicker4=document.getElementById('datepicker4-'+id_obj).value;

if(nome_obj!='' && datepicker3 !='' && datepicker4!=''){


		var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4) {
 retorno=xhttp.responseText;
if (retorno==1) {
nome_obj='';
datepicker3='';
datepicker4='';
div="div-"+id;
novo_objetivo(div);
location.reload();
}else{
alert("Erro ao adicionar objetivo. Tente novamente");
}
}
    
  };
  xhttp.open("GET", "ajax/ajax_cadastro.php?fase="+fase+"&nome_obj="+nome_obj+"&datepicker3="+datepicker3+"&datepicker4="+datepicker4+"&id="+id, true);


  xhttp.send();
}else{
	alert("Preencha os dados Corretamente")
}

}

function exclui_proj(id){
fase="exclui_projeto";

var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4) {
 retorno=xhttp.responseText;
if (retorno==1) {

location.reload();
}else{
alert("Erro ao Excluir projeto. Tente novamente");
}
}
    
  };
  xhttp.open("GET", "ajax/ajax_cadastro.php?fase="+fase+"&id="+id, true);


  xhttp.send();
}

function detalhe(id){
	div="detalhe-"+id;
	div=document.getElementById(div);

	if(div.style.display=="block"){
		div.style.display="none";
	}else{
		div.style.display="block";
	}

}
function show(id){
	bt="bt-"+id;
	div="detalhe_obj-"+id;

	div=document.getElementById(div);
	bt=document.getElementById(bt);

	if(div.style.display=="none"){
		div.style.display="block";
	
	bt.src="images/show_down.png";
	}else{
		div.style.display="none";
		bt.src="images/show_up.png";
		
	}
}
function conclui(id){

fase="conclui";
  nome="nome-"+id;

  nome1=document.getElementById(nome).innerHTML;	
var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4) {
 retorno=xhttp.responseText;

if (retorno=="N") {

  concluido = nome1.strike();
  document.getElementById(nome).innerHTML=concluido;
}else{

	document.getElementById(nome).innerHTML=nome1;
}
location.reload();
}
    
  };
  xhttp.open("GET", "ajax/ajax_cadastro.php?fase="+fase+"&id="+id, true);

  xhttp.send();
}

function deleta_obj(id){
div=document.getElementById("obj_div-"+id);
fase="exclui_obj";	
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (xhttp.readyState == 4) {
 retorno=xhttp.responseText;

if (retorno==1) {
div.style.display="none";
}else{

	alert("Erro ao excluir objetivo. Tente novamente");
}

}
    
  };
  xhttp.open("GET", "ajax/ajax_cadastro.php?fase="+fase+"&id="+id, true);

  xhttp.send();
}

function conclui_projeto(id){
	fase="conclui_projeto";
	var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (xhttp.readyState == 4) {
 retorno=xhttp.responseText;

if (retorno==1) {
location.reload();
}else{

	alert("Erro ao Concluir objetivo. Tente novamente");
}

}
    
  };
  xhttp.open("GET", "ajax/ajax_cadastro.php?fase="+fase+"&id="+id, true);

  xhttp.send();
}
function edit_proj(id){
	h2=document.getElementById("nome-"+id);
	input=document.getElementById("edita-"+id);

	if(h2.style.display=="block"){
		input.style.display="block";
		h2.style.display="none";
	}else{
		input.style.display="none";
		h2.style.display="block";
	}

}

function edit_projbd(id){

	fase="edit_projeto";
	h2=document.getElementById("nome-"+id);

	input=document.getElementById("edita-"+id);
	novo=document.getElementById("edita-"+id).value;
	var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {

if (xhttp.readyState == 4) {

 retorno=xhttp.responseText;

if (retorno==1) {
	
input.style.display="none";
h2.style.display="block";

h2.innerHTML=novo;
}else{

	alert("Erro ao Concluir objetivo. Tente novamente");
}
}
};
  xhttp.open("GET", "ajax/ajax_cadastro.php?novo="+novo+"&fase="+fase+"&id="+id, true);

  xhttp.send();
}


(function($) {

	skel
		.breakpoints({
			xlarge: '(max-width: 1680px)',
			large: '(max-width: 1280px)',
			medium: '(max-width: 980px)',
			small: '(max-width: 736px)',
			xsmall: '(max-width: 480px)'
		});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				window.setTimeout(function() {
					$body.removeClass('is-loading');
				}, 100);
			});

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on medium.
			skel.on('+medium -medium', function() {
				$.prioritize(
					'.important\\28 medium\\29',
					skel.breakpoint('medium').active
				);
			});

		// Nav.
			$('#nav')
				.append('<a href="#nav" class="close"></a>')
				.appendTo($body)
				.panel({
					delay: 500,
					hideOnClick: true,
					hideOnSwipe: true,
					resetScroll: true,
					resetForms: true,
					side: 'right'
				});

	});

})(jQuery);

