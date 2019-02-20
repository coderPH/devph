<?php
	verificaPermissaoPagina(4);
?>
<div class="box-conteudo">
	<h2><i class="fas fa-address-card"></i> Cadastrar Slider</h2>

	<form method="post" enctype="multipart/form-data">
		<?php

			if (isset($_POST['acao'])) {
				$nome = $_POST['nome'];
				$imagem = $_FILES['imagem'];
						

			if ($nome == '') {
				Painel::alerta('erro','O campo nome não pode ficar vázio.');
			}else{
				// podemos cadastrar
				if (Painel::imagemValida($imagem) == false) {
					Painel::alerta('erro','O formato da imagem especificado não está correto.');
				}else{
					// vamos cadastrar no banco de dados
					$imagem = Painel::uploadFile($imagem);
					$array = ['nome'=>$nome, 'slide'=>$imagem, 'ordem_id'=>'0', 'nome_tabela'=>'tb_site_slides'];
					Painel::inserir($array);
					Painel::alerta('sucesso','O cadastro do slider foi realizado com sucesso.');	
				}
			}
		}

		?>

		<div class="formulario-grupo">
			<label>Nome do Slider:</label>
			<input type="text" name="nome" >
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