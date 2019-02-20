<?php
	verificaPermissaoPagina(4);
?>
<div class="box-conteudo">
	<h2><i class="fas fa-address-card"></i> Adicionar Usuário</h2>

	<form method="post" enctype="multipart/form-data">
		<?php

			if (isset($_POST['acao'])) {
				
				$login = $_POST['login'];
				$nome = $_POST['nome'];
				$senha = $_POST['senha'];
				$imagem = $_FILES['imagem'];
				$cargo = $_POST['cargo'];
						

			if ($login == '') {
				Painel::alerta('erro','Preencha o usuário correto.');
			}elseif ($nome == '') {
				Painel::alerta('erro','Preencha o nome correto.');
			}elseif ($senha == '') {
				Painel::alerta('erro','Preencha a senha correta.');
			}elseif ($cargo == '') {
				Painel::alerta('erro','O cargo precisa estar selecionado.');
			}elseif ($imagem['name'] == '') {
				Painel::alerta('erro','A imagem precisa estar selecionada');
			}else{
				// podemos cadastrar
				if ($cargo >= $_SESSION['cargo']) {
					Painel::alerta('erro','Você precisa selecionar um cargo menor que o seu.');
				}elseif (Painel::imagemValida($imagem) == false) {
					Painel::alerta('erro','O formato da imagem especificado não está correto.');
				}elseif (Usuario::usuarioExistente($login)) {
					Painel::alerta('erro','O usuário já foi cadastrado, tente com outro nome de usuário.');
				}else{
					// vamos cadastrar no banco de dados
					$usuario = new Usuario();
					$imagem = Painel::uploadFile($imagem);
					$usuario->adicionarUsuario($login,$senha,$imagem,$nome,$cargo);
					Painel::alerta('sucesso','O cadastro do usuário '.$login.' foi inserido com sucesso.');	
				}
			}
		}

		?>

		<div class="formulario-grupo">
			<label>Usuário:</label>
			<input type="text" name="login" >
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<label>Nome:</label>
			<input type="text" name="nome" >
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<label>Senha:</label>
			<input type="password" name="senha" >
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<label>Cargo:</label>
			<select name="cargo">
				<?php 
					foreach (Painel::$cargos as $key => $value) {
						if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
					}
				?>
			</select>
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<label>Imagem:</label>
			<input type="file" name="imagem">
			<input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img'];?>">
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<input type="submit" name="acao" value="Enviar">
		</div><!-- formulario grupo-->
	</form>
</div><!--box-conteudo-->