<div class="box-conteudo">
	<h2><i class="fas fa-wrench"></i> Editar Usuário</h2>

	<form method="post" enctype="multipart/form-data">
	
		<?php 

			if(isset($_POST['acao'])) {
				//enviei o formulario
				
				$nome = $_POST['nome'];
				$senha = $_POST['senha'];
				$imagem = $_FILES['imagem'];
				$imagem_atual = $_POST['imagem_atual'];
				$usuario = new Usuario();
				if ($imagem['name'] != '') {
					//existe o upload de imagem
					if(Painel::imagemValida($imagem)){
						Painel::deletarFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
							if($usuario->atualizarUsuario($nome,$senha,$imagem)){
								$_SESSION['img'] = $imagem;
							Painel::alerta('sucesso','Usuário editado com sucesso junto com a imagem.');
						}else{
							Painel::alerta('erro','Ocorreu um erro ao editado o usuário.');
						}
					}else{
						Painel::alerta('erro','O tamanho/formato da imagem não é válido.');
					}
				}else{
					$imagem = $imagem_atual;
					if($usuario->atualizarUsuario($nome,$senha,$imagem)){
						$_SESSION['nome'] = $nome;
						$_SESSION['senha'] = $senha;
						Painel::alerta('sucesso','Usuário editado com sucesso.');
					}else{
						Painel::alerta('erro','Ocorreu um erro ao editado o usuário.');
					}

				}
			}

		?>
	

		<div class="formulario-grupo">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?php echo $_SESSION['nome'];?> " required>
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<label>Senha:</label>
			<input type="password" name="senha" value="<?php echo $_SESSION['senha'];?>" required>
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