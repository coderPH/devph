<?php
	session_start();
	date_default_timezone_set('America/Bahia');
	
	$autoload = function($class){
		if($class == 'email'){
			require_once('classes/phpmailer/PHPMailerAutoLoad.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	// url amigavel uhu - costantes
	define('INCLUDE_PATH','http://localhost:8080/projeto1/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	define('BASE_DIR_PAINEL',__DIR__.'/painel/');
	//conectar com o banco d dados
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','projeto_01');


	//costantes para painel de controle
	define('NOME_EMPRESA', 'devPH');

	//funcoes do painel
	function pegaCargo($indice) {
		return Painel::$cargos[$indice];
	}

	function selecionadoMenu($parametro){
		// <i class="fa fa-angle-double-right"></i>
		$url = explode('/',@$_GET['url'])[0];
		if ($url == $parametro) {
			echo 'class="menu-active"';
		}
	}

	function verificaPermissao($permissao){
		if ($_SESSION['cargo'] >= $permissao) {
			return;
		}else{
			echo 'style="display:none";';
		}
	}

	function verificaPermissaoPagina($permissao){
		if ($_SESSION['cargo'] >= $permissao) {
			return;
		}else{
			include('painel/pages/permissao-negada.php');
			die();
		}
	}
?>