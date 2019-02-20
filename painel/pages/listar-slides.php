<?php
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		$selectImagem = Bd::conectar()->prepare("SELECT slide FROM  `tb_site_slides` WHERE id = ?");
		$selectImagem->execute(array($_GET['excluir']));
		$imagem = $selectImagem->fetch()['slide'];
		Painel::deletarFile($imagem);
		Painel::deletar('tb_site_slides',$idExcluir);
		Painel::redirecionamento(INCLUDE_PATH_PAINEL.'listar-slides');
	}elseif(isset($_GET['ordem']) && isset($_GET['id'])) {
		Painel::ordenarItens('tb_site_slides',$_GET['ordem'],$_GET['id']);
	}
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 4; //mostra quantos dados sera exibido
	 	$slides = Painel::selecionaTudo('tb_site_slides',($paginaAtual - 1) * $porPagina,$porPagina);	
	  
?>
<div class="box-conteudo">
	<h2><i class="fas fa-list-ul"></i> Listar Slides Cadastrados</h2>
	<div class="tabela-wraper">
	<table>
		<tr>
			<td>Nome:</td>
			<td>Imagem:</td>
			<td>#</td>
			<td>#</td>
			<td>#</td>
			<td>#</td>
		</tr>
		<?php

			foreach ($slides as $key => $value) {
				
			

		?>
		<tr>
			<td><?php echo $value['nome'];?></td>
			<td><img style="height: 50px;width: 50px;" src="<?php echo INCLUDE_PATH_PAINEL;?>uploads/<?php echo $value['slide'];?>"></td>
			<td><a href="<?php echo INCLUDE_PATH_PAINEL;?>editar-slide?id=<?php echo $value['id']; ?>" class="botao editar"><i class="fas fa-pencil-alt"></i> Editar</a></td>
			<td><a actionBotao="deletar" href="<?php echo INCLUDE_PATH_PAINEL;?>listar-slides?excluir=<?php echo $value['id']; ?>" class="botao excluir"><i class="fa fa-times"></i> Excluir</a></td>
			<td><a class="botao ordem" href="<?php echo INCLUDE_PATH_PAINEL;?>listar-slides?ordem=cima&id=<?php echo $value['id'];?>"><i class="fas fa-chevron-up"></i></i></a></td>
			<td><a class="botao ordem" href="<?php echo INCLUDE_PATH_PAINEL;?>listar-slides?ordem=baixo&id=<?php echo $value['id'];?>"><i class="fas fa-chevron-down"></i></a></td>
		</tr>

	<?php } ?>

	</table>
</div><!--tabela wraper-->
	<div class="paginacao">
		<?php
			$totalPaginas = ceil(count(Painel::selecionaTudo('tb_site_slides')) / $porPagina);// "ceil serve para arredondar 1,5 para 2"
			for ($i=1; $i <= $totalPaginas; $i++) { 
				if($i == $paginaAtual)
				echo '<a class="pagina-selecionada" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
				else
				echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
			}
		?>
	</div><!--paginação-->
</div><!-- box conteudo-->