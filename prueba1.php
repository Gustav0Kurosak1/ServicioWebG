<?php
//  1 = Activo, en comentario = desactivado  ejem: //define(....
define(CACHE,"1");

require_once 'Clases/Buscador.lib.php';
require_once 'Clases/Cache.class.php';

if(defined(CACHE)){
    $cache = new TrabajaCache;
    $cache->CreaCache();
}
$q = htmlentities($_GET['q']);
$pag = htmlentities($_GET['page']);
$buscador = new BuscadorMp3($q,$pag);
$buscador->web = "http://www.entra-ya.com.ar/musica/";
$buscador->Descarga = 1;

if($_GET['q']){
    $buscadorS = $buscador->agregarBusqueda();
    $_q = str_replace("+"," ", 
          str_replace("-", " ",
          $buscador->limpiar($q)));
}

if($_POST['q']){
$qp = htmlentities($_POST['q']);
    header("location: ".$buscador->web."buscar-".str_replace(" ","-",$qp)."/");
    die();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="es" lang="es"> 
<head>
<title>Entra-ya | Musica - Escucha la vida</title> 
<meta name='description' content='Busca, escucha y descarga tus mejores canciones sin tener que esperar para descargar ni escuchar sin limites'> 
<meta name='keywords' content='musica gratis,musica descargar,descargar sin limites,no esperar,canciones,descargar,musica online, buscador de musica,buscador,buscador musica'>  
<base href='<?=$buscador->web?>'/> 
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<style type="text/css">
<!--
.new-search {
	font-family:Helvetica, Arial, sans-serif;
	margin-bottom: 10px;
}
.new-search .search-body {
	background: url(http://o2.t26.net/images/bg-search-body.png) top left repeat-x;
	padding: 12px;
	-moz-border-radius: 5px 5px 5px 5px;
	-webkit-border-radius: 5px 5px 5px 5px;
	border-radius: 5px 5px 5px 5px;
	position: relative;
	border: 1px solid #000;
	z-index: 30;
	height: 40px;
}
.new-search.posts .search-body { background-color: #114f7c; }
.new-search .search-body .input-search-left,.new-search .search-body .input-search-middle,.new-search .search-body .input-search-right {
	display: block;
	float: left;
	height: 42px;
	background-image: url(http://o2.t26.net/images/input-home.png);
	width: 5px;
}

	.new-search .search-body .input-search-left {
		background-repeat: no-repeat;
		background-position: 0 0;
	}
	
	
	.new-search .search-body .input-search-middle {
		background-color:transparent;
		background-position:0 -42px;
		background-repeat:repeat-x;
		border:0 none;
		font-family:Helvetica, Arial, sans-serif;
		font-size:18px;
		font-weight:bold;
		height:21px;
		margin:0;
		color: 999;
		padding:10px 4px;
		width:854px;
		color: #999;
	}
	
	.new-search .search-body .input-search-right {
		background-repeat: no-repeat;
		background-position: bottom right;
	}
	
	.btn-search-home {
		position:absolute;
		z-index:10;
		right:16px;
		top:15px;
		display:block;
		width:39px;
		height:35px;
		background: url(http://o2.t26.net/images/btn-home-search.png) no-repeat top left;
		
	}
	#centro{
		padding:2px;
		padding-left:6px;
		padding-right:6px;
		width:900px;
		height:auto;
	}
	#todo {
		position: absolute;
		width: 1015px;
		height: 450px;;
	}
	body {
		background-image: url(http://www.entra-ya.com.ar/musica/fondo.jpg);
	}
	#temas{
		padding:2px;
		padding-left:60px;
		padding-right:6px;
		width:600px;
		height:auto;
		position: absolute;
	}
	#temas2{
		padding:2px;
		padding-left:6px;
		padding-right:60px;
		width:280px;
		height:auto;
		float:right;
	}
	#temas3{
		padding: 240px 6px 2px 60px;
		width:600px;
		height:auto;
	}
	.tdentro {
		background: url(http://o2.t26.net/images/bg-search-body.png) top left repeat-x;
		padding: 12px;
		-moz-border-radius: 5px 5px 5px 5px;
		-webkit-border-radius: 5px 5px 5px 5px;
		border-radius: 5px 5px 5px 5px;
		position: relative;
		border: 1px solid #000;
		z-index: 30;
		text-align: left;
	}
-->
</style>
		<script type="text/javascript"> 
 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17773237-2']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 
</script> 
<script type="text/javascript" src="js/core.js"></script>
<script type="text/javascript" src="js/player.js"></script>
<script type="text/javascript"> function fnHP(lnk){      lnk.style.behavior='url(#default#homepage)'; 	sQueryHome = lnk.isHomePage('http://imbaty.com'); 	if(!sQueryHome) lnk.setHomePage('http://google.com'); 	   return true; } </script>

</head>
<body>
<div id="todo">
<center>
<div id="centro">
<div class="new-search posts"><!-- buscador --> 
	<div class="search-body clearfix"> 
		<form name="search" action="index.php" method="post"> 
			<div class="input-search-left"></div> 
			<input type="hidden" name="procesar" value="1" />
			<input class="input-search-middle" name="q" type="text" value="<?=$_q?>" /> 
			<div class="input-search-right"></div> 
			<input type="submit"  class="btn-search-home" value="" />  
					</form> 
	</div> 
</div></div></center>
<center>
<div id="temas">
<div class="tdentro">
<div id="lista">
<?php
                    
                        if($buscadorS == false){
                            echo "No encontramos resultados para su busqueda: ".$_q;
                        }else{
                            for($i=0;$i<count($buscadorS[0]);$i++){
                                echo $buscador->nuevoSong($buscadorS[1][$i],
                                                          $buscadorS[2][$i],
                                                          $buscadorS[3][$i]);
                            }
                        }
                        
?></div>
</div></div>
<div id="temas2"><div class="tdentro">
<?
if($_GET['q']){
?>
<div id="player"><center><script type="text/javascript"><!--
google_ad_client = "ca-pub-7196350699220854";
/* musica1 */
google_ad_slot = "2214468750";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center></div>
<?php } ?>
</div></div></center>
<div id="temas3">
<div class="tdentro">
<?
require_once "Clases/Paginated.php";
require_once "Clases/DoubleBarLayout.php";
$paginacion = new Paginated($buscador->totalResultados(), 10, $pag);
$paginacion->setLayout(new DoubleBarLayout($_q));
echo $paginacion->fetchPagedNavigation();
?>
</div></div></div>
</body>
</html>
<? (defined(CACHE)?$cache->CierraCache():''); ?>
