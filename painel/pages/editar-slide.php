<?php
	//verificaPermissaoPagina(4);
	if (isset($_GET['id'])) {
		$id = (int)$_GET['id'];
		$slide = Painel::selecionar('tb_site_slides', 'id = ?',array($id));
	}else{
		Painel::alerta('erro','Você precisa passar o parametro ID.');
		die();
	}
?>
<div class="box-conteudo">
	<h2><i class="fas fa-wrench"></i> Editar Slider</h2>

	<form method="post" enctype="multipart/form-data">
	
		<?php 

			if(isset($_POST['acao'])) {
				//enviei o formulario
				
				$nome = $_POST['nome'];
				$imagem = $_FILES['imagem'];
				$imagem_atual = $_POST['imagem_atual'];
				if ($imagem['name'] != '') {
					//existe o upload de imagem
					if(Painel::imagemValida($imagem)){
						Painel::deletarFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						$array = ['nome'=>$nome, 'slide'=>$imagem, 'id'=>$id, 'nome_tabela'=>'tb_site_slides'];
						Painel::atualizar($array);
						$slide = Painel::selecionar('tb_site_slides', 'id = ?',array($id));
						Painel::alerta('sucesso','O slider foi editado junto com a imagem sucesso!');
					}else{
						Painel::alerta('erro','O tamanho/formato da imagem não é válido.');
					}
				}else{
					$imagem = $imagem_atual;
					$array = ['nome'=>$nome, 'slide'=>$imagem, 'id'=>$id, 'nome_tabela'=>'tb_site_slides'];
					Painel::atualizar($array);
					$slide = Painel::selecionar('tb_site_slides', 'id = ?',array($id));
					Painel::alerta('sucesso','O slider foi editado com sucesso!');
					}

				}
		?>
	

		<div class="formulario-grupo">
			<label>Nome do Slider:</label>
			<input type="text" name="nome" value="<?php echo $slide['nome'];?> " required>
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<label>Imagem:</label>
			<input type="file" name="imagem">
			<input type="hidden" name="imagem_atual" value="<?php echo $slide['slide'];?>">
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<input type="submit" name="acao" value="Enviar">
		</div><!-- formulario grupo-->
	</form>
</div><!--box-conteudo-->