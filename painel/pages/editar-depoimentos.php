<?php
	//verificaPermissaoPagina(4);
	if (isset($_GET['id'])) {
		$id = (int)$_GET['id'];
		$depoimento = Painel::selecionar('tb_site_depoimentos', 'id = ?',array($id));
	}else{
		Painel::alerta('erro','Você precisa passar o parametro ID.');
		die();
	}
?>
<div class="box-conteudo">
	<h2><i class="fas fa-pencil-alt"></i> Editar Depoimentos</h2>

	<form method="post" enctype="multipart/form-data">
		<?php

			if (isset($_POST['acao'])) {
				if(Painel::atualizar($_POST)){
					Painel::alerta('sucesso','O depoimento foi editado com sucesso.');
					$depoimento = Painel::selecionar('tb_site_depoimentos', 'id = ?',array($id));
				}else{
					Painel::alerta('erro','Ocorreu um erro ao editar o depoimento.');
				}

			}
		?>

		<div class="formulario-grupo">
			<label>Nome da Pessoa:</label>
			<input type="text" name="nome" value="<?php echo $depoimento['nome'];?>" placeholder="Digite o nome da pessoa que vai ser editada." >
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<label>Depoimento:</label>
			<textarea name="depoimento"><?php echo $depoimento['depoimento'];?></textarea>
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<label>Data:</label>
			<input formato="data" type="text" name="data" value="<?php echo $depoimento['data'];?>" placeholder="Digite a data no formato : 12/02/2019">
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="hidden" name="nome_tabela" value="tb_site_depoimentos">
			<input type="submit" name="acao" value="Enviar">
		</div><!-- formulario grupo-->
	</form>
</div><!--box-conteudo-->