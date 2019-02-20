<?php
	verificaPermissaoPagina(4);
?>
<div class="box-conteudo">
	<h2><i class="fas fa-newspaper"></i> Cadastrar Serviço</h2>

	<form method="post" enctype="multipart/form-data">
		<?php

			if (isset($_POST['acao'])) {

				if(Painel::inserir($_POST)){
					Painel::alerta('sucesso','O cadastro do serviço foi realizado com sucesso.');

				}else{
					Painel::alerta('erro','Campos vázios não são permitidos.');
				}	
				

			}
		?>

		<div class="formulario-grupo">
			<label>Descreva o serviço:</label>
			<textarea name="servico"></textarea>
		</div><!-- formulario grupo-->
		
		<div class="formulario-grupo">
			<input type="hidden" name="ordem_id" value="0">
			<input type="hidden" name="nome_tabela" value="tb_site_servicos">
			<input type="submit" name="acao" value="Enviar">
		</div><!-- formulario grupo-->
	</form>
</div><!--box-conteudo-->