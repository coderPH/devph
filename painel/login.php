<?php
	if (isset($_COOKIE['lembrar'])) {
		$usuario = $_COOKIE['usuario'];
		$senha = $_COOKIE['senha'];
		$sql = Bd::conectar()->prepare("SELECT * FROM tb_admin_usuarios WHERE usuario = ? AND senha = ?");
		$sql->execute(array($usuario,$senha));
		if($sql->rowCount() == 1){
			$info = $sql->fetch();
			$_SESSION['login'] = true;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['senha'] = $senha;
			$_SESSION['cargo'] = $info['cargo'];
			$_SESSION['nome'] = $info['nome'];
			$_SESSION['img'] = $info['img'];
			header('Location: '.INCLUDE_PATH_PAINEL);
			die();
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle - devProjeto</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL; ?>estilo/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>estilo/all.css">
	<link rel="shortcut icon" href="<?php echo INCLUDE_PATH;?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo INCLUDE_PATH; ?>/favicon.ico" type="image/x-icon">
</head>
<body>
	<h1>Painel de Controle - devPH</h1>
	<div class="box-login">
		<?php
			if(isset($_POST['acao'])){
				$usuario = $_POST['usuario'];
				$senha = $_POST['senha'];
				$sql = Bd::conectar()->prepare("SELECT * FROM tb_admin_usuarios WHERE usuario = ? AND senha = ?");
				$sql->execute(array($usuario,$senha));
				if($sql->rowCount() == 1){
					$info = $sql->fetch();
					//logamos com sucesso
					$_SESSION['login'] = true;
					$_SESSION['usuario'] = $usuario;
					$_SESSION['senha'] = $senha;
					$_SESSION['cargo'] = $info['cargo'];
					$_SESSION['nome'] = $info['nome'];
					$_SESSION['img'] = $info['img'];
					if(isset($_POST['lembrar'])) {
						setcookie('lembrar', true, time()+(60*60*24),'/');
						setcookie('usuario',$usuario,time()+(60*60*24),'/');
						setcookie('senha',$senha,time()+(60*60*24),'/');
					}
					header('Location: '.INCLUDE_PATH_PAINEL);
					die();
				}else{
					//falhou
					echo '<div class="erro-bd"><i class="fa fa-times"></i> Erro ao efetuar o login, revise seus dados.</div>';
				}
			}

		?>
		<h3>Efetue o login abaixo:</h3>
		<form method="post">
			<i class="fas fa-user"></i>
			<input type="text" name="usuario" placeholder="Digite seu usuario..." required>
			<i class="fas fa-key"></i>
			<input type="password" name="senha" placeholder="Digite sua senha..." required>
			<div class="formulario-grupo-login left">
				<input type="submit" name="acao" value="Entrar">
			</div><!--formulario grupo login -->
			<div class="formulario-grupo-login right">
				<label>Lembrar-me</label>
				<input type="checkbox" name="lembrar">
			</div><!--formulario grupo login -->
			<div class="clear"></div><!--clear-->
		</form>
	</div><!--box-login-->
</body>
</html>