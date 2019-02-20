<?php
	include ('config.php');
?>
<?php
	site::atualizarUsuarioOnline();
?>
<?php
	site::contador();
?>
<!DOCTYPE html>
<html>
<head>
	<title>devProjeto 01</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="palavras-chaves,do,meu,site">
	<meta name="description" content="Aqui ficara a descrição do site">
	<!-- fontes -->
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>estilo/all.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<!-- fontes -->
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>estilo/estilo.css">
	<link rel="shortcut icon" href="<?php echo INCLUDE_PATH;?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo INCLUDE_PATH; ?>/favicon.ico" type="image/x-icon">
	

</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?>"/>

	<?php
		//se existir o get url
			$url = isset($_GET['url']) ? $_GET['url'] : 'home' ;

			switch ($url) {
				case 'depoimentos':
					echo '<target target="depoimentos" />';
					break;
				
				case 'servicos':
					echo '<target target="servicos" />';
				break;

				}

	?>
	<div class="sucesso">Formulário enviado com sucesso!</div>
	<div class="error">Oops! por algum motivo o formulário não pode ser enviado, revise todos os campos.</div>
	<div class="overlay-loading">
		<img src="<?php echo INCLUDE_PATH; ?>images/ajax-loader.gif">
	</div><!-- overlay-loading -->

	<header>
		<div class="center">
		<div class="logo left"><a href="<?php echo INCLUDE_PATH;?>">devPH</a></div><!--logo-->
		<nav class="desktop right">
			<ul>
				<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
				<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
			</ul>
		</nav>
		<nav class="mobile right">
			<div class="botao-menu-mobile">
				<i class="fa fa-bars" aria-hidden="true"></i>
				<!--<i class="fas fa-times" aria-hidden="true"></i>!-->
			</div>
			<ul>
				<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
				<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
			</ul>
		</nav>
		<div class="clear"></div><!--clear-->
	</div><!-- center-->
	</header>
	<div class="container-principal">
		<?php
			
			
			//se existir o arquivo ele vai incluir
			if(file_exists('pages/'.$url.'.php')){
				include('pages/'.$url.'.php');
			}else{
						/// se for diferente 
					if($url != 'depoimentos' && $url != 'servicos') {
				//se nao vamo direcionar um arquivo de error;
				$pagina404 = true;
				include('pages/404.php');
			}else{
				include('pages/home.php');
			}
		}			
		?>
	</div><!-- container-principal -->
		<footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"';?>>
			<div class="center">
			<p>devProjeto 2019 - Todos os direitos reservados.</p>
		</div><!--center-->
					<div class="ph">
				<p><i class="fas fa-code"></i> <a href="">phDev</a></p>
				
			</div>
		</footer>
	<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCcvyLb1jXDkbrtIiE39vsKF3GpQfp5yQ4&#038;ver=4.9.9"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
	<script src="<?php echo INCLUDE_PATH;?>js/constants.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>

	<?php 
	//se a $url for igual a 'home' ou $url for igual a vazio , carrega
		if($url == 'home' || $url == '') {
	?>
	<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
<?php } ?>
	<?php 
		if($url == 'contato'){
	?>
	

<?php }?>
<script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
</body>
</html>