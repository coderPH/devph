
<?php

	//include('../classes/painel.php');
	if(isset($_SESSION['login']) == true){
		//echo 'Bem-vindo ao painel '.$_SESSION['usuario'];
	}else{
	header('Location: index.php');
	}

	if(isset($_GET['sair'])){
		Painel::sair();
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle - devPH</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL; ?>estilo/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>estilo/all.css">
	<link rel="shortcut icon" href="<?php echo INCLUDE_PATH;?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo INCLUDE_PATH; ?>/favicon.ico" type="image/x-icon">
</head>
<body>	
	<div class="menu">	
		<div class="menu-wraper">
	<div class="box-usuario">
		<?php 
			if($_SESSION['img'] == ''){

		?>
			<div class="avatar-usuario">
				<i class="fa fa-user"></i>
			</div><!-- avatar usuario -->
		<?php } else { ?>
			<div class="imagem-usuario">
				<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>">
			</div><!-- img usuario -->
		<?php } ?>
			<div class="nome-usuario">
				<p><?php echo $_SESSION['nome'];?></p>
				<p><?php echo pegaCargo($_SESSION['cargo']);?></p>
			</div>
		</div><!-- box usuario -->
		<div class="itens-menu">
			<h2>Cadastro</h2>
			<a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastrar-depoimento">Cadastrar Depoimento</a>
			<a <?php selecionadoMenu('cadastrar-servico'); ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>cadastrar-servico">Cadastrar Serviço</a>
			<a <?php selecionadoMenu('cadastrar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>cadastrar-slides">Cadastrar Slides</a>
			<h2>Gestão</h2>
			<a <?php selecionadoMenu('listar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-depoimentos">Listar Depoimentos</a>
			<a <?php selecionadoMenu('listar-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>listar-servicos">Listar Serviços</a>
			<a <?php selecionadoMenu('listar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>listar-slides">Listar Slides</a>
			<h2>Administração do Painel</h2>
			<a <?php selecionadoMenu('editar-usuario'); ?> <?php verificaPermissao(4); ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>editar-usuario">Editar Usuário</a>
			<a <?php selecionadoMenu('adicionar-usuario'); ?><?php verificaPermissao(4); ?> href="<?php echo INCLUDE_PATH_PAINEL; ?>adicionar-usuario">Adicionar Usuário</a>
			<h2>Configuração Geral</h2>
			<a <?php selecionadoMenu('editar-site');?> <?php verificaPermissao(4); ?> href="">Editar</a>
		</div><!-- item-menu-->
	</div> <!-- menu wraper-->
	</div><!-- menu -->
	<header>
		<div class="center">
			<div class="menu-botao">
				<i class="fas fa-bars"></i>
			</div><!-- menu botao -->
		<div class="sair">
			<a <?php if(@$_GET['url'] == ''){ ?>style="background: #465d68; padding: 10px 15px;"<?php }?> href="<?php echo INCLUDE_PATH_PAINEL;?>"><i class="fas fa-home"></i><span> Página Inicial</span></a>
			<a href="<?php echo INCLUDE_PATH_PAINEL;?>?sair"><i class="fas fa-sign-out-alt"></i><span> Sair</span></a>
		</div><!-- sair -->
	<div class="clear"></div><!--clear-->
	</div><!--  center-->
	</header>

	<div class="conteudo">
		<?php Painel::carregarPagina(); ?>
	</div><!--content-->
	<!-- scripts -->
	<script src="<?php echo INCLUDE_PATH ;?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/jquery.mask.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
</body>
</html>