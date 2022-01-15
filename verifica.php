<?php
ini_set("display_errors",0);
error_reporting(0);

if(!$_COOKIE["logado"]){
echo '
<script type="text/javascript">
alert("Logue-se para poder vizualizar esssa pagina");
location="index.php",;
</script>
';
}
?>