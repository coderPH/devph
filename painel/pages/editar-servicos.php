<?php
	//verificaPermissaoPagina(4);
	if (isset($_GET['id'])) {
		$id = (int)$_GET['id'];
		$servicos = Painel::selecionar('tb_site_servicos', 'id = ?',array($id));
	}else{
		Painel::alerta('erro','Você precisa passar o parametro ID.');
		die();
	}
?>
<div class="box-conteudo">
	<h2><i class="fas fa-pencil-alt"></i> Editar Serviços</h2>

	<form method="post" enctype="multipart/form-data">
		<?php

			if (isset($_POST['acao'])) {
				if(Painel::atualizar($_POST)){
					Painel::alerta('sucesso','O serviço foi editado com sucesso.');
					$servicos = Painel::selecionar('tb_site_servicos', 'id = ?',array($id));
				}else{
					Painel::alerta('erro','Ocorreu um erro ao editar o serviço.');
				}

			}
		?>

		
		<div class="formulario-grupo">
			<label>Serviço:</label>
			<textarea name="servicos"><?php echo $servicos['servicos'];?></textarea>
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="hidden" name="nome_tabela" value="tb_site_servicos">
			<input type="submit" name="acao" value="Enviar">
		</div><!-- formulario grupo-->
	</form>
</div><!--box-conteudo-->