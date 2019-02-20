<?php
	verificaPermissaoPagina(4);
?>
<div class="box-conteudo">
	<h2><i class="fas fa-newspaper"></i> Cadastrar Depoimentos</h2>

	<form method="post" enctype="multipart/form-data">
		<?php

			if (isset($_POST['acao'])) {

				if(Painel::inserir($_POST)){
					Painel::alerta('sucesso','O cadastro do depoimento foi realizado com sucesso.');

				}else{
					Painel::alerta('erro','Campos vázios não são permitidos.');
				}	
				

			}
		?>

		<div class="formulario-grupo">
			<label>Nome da Pessoa:</label>
			<input type="text" name="nome" placeholder="Digite o nome da pessoa do depoimento." >
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<label>Depoimento:</label>
			<textarea name="depoimento"></textarea>
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<label>Data:</label>
			<input formato="data" type="text" name="data" placeholder="Digite a data no formato : 12/02/2019">
		</div><!-- formulario grupo-->
		<div class="formulario-grupo">
			<input type="hidden" name="ordem_id" value="0">
			<input type="hidden" name="nome_tabela" value="tb_site_depoimentos">
			<input type="submit" name="acao" value="Enviar">
		</div><!-- formulario grupo-->
	</form>
</div><!--box-conteudo-->