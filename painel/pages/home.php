<?php 

	$usuariosOnline = Painel::listarUsuariosOnline();
	$totalVisitas = Painel::pegarTotalVisitas();
	$visitasHoje = Painel::pegarVisitasHoje();
	
/*
	$visitasHoje = Bd::conectar()->prepare("SELECT * FROM `tb_admin_visitas` WHERE dia = ?");
	$visitasHoje->execute(array(date('Y-m-d')));
	$visitasHoje = $visitasHoje->rowCount();
	*/
?>

<div class="box-conteudo w100">
			<h2><i class="fa fa-home"></i> Painel de Controle - <?php echo NOME_EMPRESA;?></h2>	
			<span>Atenção: Ainda estou desenvolvendo.</span>
			<div class="box-metricas">
				<div class="box-metricas-single">
					<div class="box-metricas-wraper">
						<h2>Usuários Online</h2>
						<p><?php echo count($usuariosOnline);?></p> <!-- imprimir o count vai contar cada array q possui na funcao/bd -->
					</div><!--box-metrica-wraper-->
				</div><!--box-metricas-single-->
				<div class="box-metricas-single">
					<div class="box-metricas-wraper">
						<h2>Total de Visitas</h2>
						<p><?php echo count($totalVisitas); ?></p>
					</div><!--box-metrica-wraper-->
				</div><!--box-metricas-single-->
				<div class="box-metricas-single">
					<div class="box-metricas-wraper">
						<h2>Visitas Hoje</h2>
						<p><?php echo count($visitasHoje); ?></p>
					</div><!--box-metrica-wraper-->
				</div><!--box-metricas-single-->
			</div><!-- box-metricas-->
			<div class="clear"></div><!--clear-->
		</div><!-- box-conteudo-->	

<div class="box-conteudo w100">
	<h2><i class="fa fa-rocket"></i> Usuários do Site</h2>
	<div class="tabela-responsiva">
		<div class="row">
			<div class="col">
				<span>IP:</span>
			</div><!-- col-->
			<div class="col">
				<span>Última Ação:</span>
			</div><!-- col-->
			<div class="clear"></div><!--clear-->
		</div><!-- row -->

			<?php

			foreach ($usuariosOnline as $key => $value) {
				
			
					
				

			?>


		<div class="row">
			<div class="col">
				<span>
					<?php
						echo $value['ip'];
					?>
				</span>
			</div><!-- col-->
			<div class="col">
				<span>
					<?php
						echo date('H:i:s - d/m/Y',strtotime($value['ultima_acao']));
					?>
				</span>
			</div><!-- col-->
			<div class="clear"></div><!--clear-->
		</div><!-- row -->
			<?php } ?>
	</div><!--tabela responsiva -->	
</div><!--box conteudo-->

<div <?php verificaPermissaoTags(3,4)?> class="box-conteudo w100">
	<h2><i class="fa fa-user"></i> Usuários do Painel</h2>
	<div class="tabela-responsiva">
		<div class="row">
			<div class="col">
				<span>Nome:</span>
			</div><!-- col-->
			<div class="col">
				<span>Cargo:</span>
			</div><!-- col-->
			<div class="clear"></div><!--clear-->
		</div><!-- row -->

			<?php
			$usuariosPainel = Bd::conectar()->prepare("SELECT * FROM `tb_admin_usuarios`");
			$usuariosPainel->execute();
			$usuariosPainel = $usuariosPainel->fetchAll();
			foreach ($usuariosPainel as $key => $value) {
				
			
					
				

			?>


		<div class="row">
			<div class="col">
				<span>
					<?php
						echo $value['usuario'];
					?>
				</span>
			</div><!-- col-->
			<div class="col">
				<span>
					<?php
						echo pegaCargo($value['cargo']);
					?>
				</span>
			</div><!-- col-->
			<div class="clear"></div><!--clear-->
		</div><!-- row -->
			<?php } ?>
	</div><!--tabela responsiva -->	
</div><!--box conteudo-->
<div class="clear"></div><!--clear-->
