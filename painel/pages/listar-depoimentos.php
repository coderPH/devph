<?php
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		Painel::deletar('tb_site_depoimentos',$idExcluir);
		Painel::redirecionamento(INCLUDE_PATH_PAINEL.'listar-depoimentos');
	}elseif(isset($_GET['ordem']) && isset($_GET['id'])) {
		Painel::ordenarItens('tb_site_depoimentos',$_GET['ordem'],$_GET['id']);
	}
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 4; //mostra quantos dados sera exibido
	 	$depoimentos = Painel::selecionaTudo('tb_site_depoimentos',($paginaAtual - 1) * $porPagina,$porPagina);	
	  
?>
<div class="box-conteudo">
	<h2><i class="fas fa-list-ul"></i> Listar Depoimentos Cadastrados</h2>
	<div class="tabela-wraper">
	<table>
		<tr>
			<td>Nome:</td>
			<td>Data:</td>
			<td>#</td>
			<td>#</td>
			<td>#</td>
			<td>#</td>
		</tr>
		<?php

			foreach ($depoimentos as $key => $value) {
				
			

		?>
		<tr>
			<td><?php echo $value['nome'];?></td>
			<td><?php echo $value['data'];?></td>
			<td><a href="<?php echo INCLUDE_PATH_PAINEL;?>editar-depoimentos?id=<?php echo $value['id']; ?>" class="botao editar"><i class="fas fa-pencil-alt"></i> Editar</a></td>
			<td><a actionBotao="deletar" href="<?php echo INCLUDE_PATH_PAINEL;?>listar-depoimentos?excluir=<?php echo $value['id']; ?>" class="botao excluir"><i class="fa fa-times"></i> Excluir</a></td>
			<td><a class="botao ordem" href="<?php echo INCLUDE_PATH_PAINEL;?>listar-depoimentos?ordem=cima&id=<?php echo $value['id'];?>"><i class="fas fa-chevron-up"></i></i></a></td>
			<td><a class="botao ordem" href="<?php echo INCLUDE_PATH_PAINEL;?>listar-depoimentos?ordem=baixo&id=<?php echo $value['id'];?>"><i class="fas fa-chevron-down"></i></a></td>
		</tr>

	<?php } ?>

	</table>
</div><!--tabela wraper-->
	<div class="paginacao">
		<?php
			$totalPaginas = ceil(count(Painel::selecionaTudo('tb_site_depoimentos')) / $porPagina);// "ceil serve para arredondar 1,5 para 2"
			for ($i=1; $i <= $totalPaginas; $i++) { 
				if($i == $paginaAtual)
				echo '<a class="pagina-selecionada" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
				else
				echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
			}
		?>
	</div><!--paginação-->
</div><!-- box conteudo-->