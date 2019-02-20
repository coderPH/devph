<section class="banner-container">
	<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/banner-principal.jpg');" class="banner-single"></div>
	<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/kk.jpg');" class="banner-single"></div>
	<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/kk2.jpg');" class="banner-single"></div>
		<div class="overlay"></div><!--overlay-->
		<div class="center">
			
		<form method="post">
			<h2>Qual é o seu melhor e-mail?</h2>
			<input type="email" name="email" placeholder="Digite aqui seu e-mail..." required>
			<input type="hidden" name="identificador" value="form_home">
			<input type="submit" name="acao" value="Cadastrar!">
		</form>
	</div><!-- center -->
	<div class="bullets">
				
			</div><!-- bullets-->
		
	</section><!--banner principapl-->
			<section class="descricao-autor">
			<div class="center">
			<div class="w50 left">
				<h2>Philipe da C. Souza</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisi mauris, fringilla eget lorem vitae, ullamcorper eleifend nisl. Proin tempor ipsum magna, volutpat lobortis velit vehicula in. Donec quis ante quis tellus interdum pharetra vel sit amet nisl. Sed in aliquam nulla, lobortis dictum eros. Nullam nec justo tincidunt, finibus nibh vitae, blandit leo.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisi mauris, fringilla eget lorem vitae, ullamcorper eleifend nisl. Proin tempor ipsum magna, volutpat lobortis velit vehicula in. Donec quis ante quis tellus interdum pharetra vel sit amet nisl. Sed in aliquam nulla, lobortis dictum eros. Nullam nec justo tincidunt, finibus nibh vitae, blandit leo.</p>
				</div><!--w50-->
				<div class="w50 left">
					<img class="right" src="<?php echo INCLUDE_PATH; ?>images/autor.jpg">
				</div> <!-- w50 imagem-->
				<div class="clear"></div>
				</div><!--center-->
		</section><!-- descricao autor -->
	
	<section class="especialidades">
		<h2 class="title">Especialidades</h2>	
		<div class="center">
			<div class="w33 left box-especialidades">
				<h3><i class="fab fa-css3" aria-hidden="true"></i></h3>
				<h4>CSS3</h4>
				<p>Lorem ipsu4 dolor sit amet, consectetur adipiscing elit. Aenean nisi mauris, fringilla eget lorem vitae, ullamcorper eleifend nisl. Proin tempor ipsum magna, volutpat lobortis velit vehicula in. Donec quis ante quis tellus interdum pharetra vel sit amet nisl.</p>
			</div><!-- box-especialidades-->
			<div class="w33 left box-especialidades">
				<h3><i class="fab fa-html5" aria-hidden="true"></i></h3>
				<h4>HTML5</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisi mauris, fringilla eget lorem vitae, ullamcorper eleifend nisl. Proin tempor ipsum magna, volutpat lobortis velit vehicula in. Donec quis ante quis tellus interdum pharetra vel sit amet nisl.</p>
			</div><!-- box-especialidades-->
			<div class="w33 left box-especialidades">
				<h3><i class="fab fa-js-square" aria-hidden="true"></i></h3>
				<h4>JavaScript</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nisi mauris, fringilla eget lorem vitae, ullamcorper eleifend nisl. Proin tempor ipsum magna, volutpat lobortis velit vehicula in. Donec quis ante quis tellus interdum pharetra vel sit amet nisl.</p>
			</div><!-- box-especialidades-->
			<div class="clear"></div><!--cleaer-->
		</div><!--center-->
	</section><!--especialidades-->

	<section class="extras">
		<div class="center">
			<div id="depoimentos" class="w50 left depoimento-container">
			<h2 class="title">Depoimentos dos nossos clientes</h2>
			<?php 
				$sql = Bd::conectar()->prepare("SELECT * FROM `tb_site_depoimentos` ORDER BY ordem_id ASC LIMIT 3 ");
				$sql->execute();
				$depoimentos = $sql->fetchAll();
				foreach ($depoimentos as $key => $recebe) {
					
			 ?>
			<div class="depoimento-single">
				<p class="depoimento-descricao"><?php echo $recebe['depoimento']; ?></p>
				<p class="nome-autor"><?php echo $recebe['nome'];?> - <?php echo $recebe['data'];?></p>
			</div><!-- depoimento single -->
		<?php } ?>
		</div><!--w50-->
		<div id="servicos" class="w50 left servicos-container">
			<h2 class="title">Serviços</h2>
				<div class="servicos">
				<ul>
					<?php
						$sql = Bd::conectar()->prepare("SELECT * FROM `tb_site_servicos` ORDER BY ordem_id ASC LIMIT 5 ");
						$sql->execute();
						$servicos = $sql->fetchAll();
						foreach ($servicos as $key => $recebe) {
					?>
					<li><?php echo $recebe['servicos'];?></li>
					<?php }?>
				</ul>
			</div><!-- servicos-->
		</div><!--w50-->
		<div class="clear"></div>
		</div><!-- center -->
	</section><!--extras-->
		