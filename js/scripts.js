$(function(){
	//aqui vai todo o nosso codigo de javascript
	$('nav.mobile').click(function(){
		//oq vai acontecer quando for clicado
		var listaMenu = $('nav.mobile ul'); // criei uma variavel e inserir a lista la em html
		
	if (listaMenu.is(':hidden') == true){
		// var icone = $('.bota-menu-mobile i') poderia ser assim
		var icone = $('.botao-menu-mobile').find('i');
		icone.removeClass('fa-bars');
		icone.addClass('fa-times');
		listaMenu.slideToggle();

	}else{
		var icone = $('.botao-menu-mobile').find('i');
		icone.removeClass('fa-times');
		icone.addClass('fa-bars');
		listaMenu.slideToggle();

	}

	});

	if($('target').length > 0){
		//o elemento existe porem precisamo dar o scroll em algum elemento
		var elemento = '#'+$('target').attr('target');
		var divScroll = $(elemento).offset().top;
		$('html,body').animate({scrollTop:divScroll},2000);
	}

	carregarDinamico();
	function carregarDinamico(){
		$('[realtime]').click(function(){
			var pagina = $(this).attr('realtime');
			$('.container-principal').hide();
			$('.container-principal').load(include_path+'/pages/'+pagina+'.php');

			setTimeout(function(){
			inicialize();
			addMarcacao(-27.609959,-48.576585,'',"Minha casa",undefined,false);
		},1000);
			$('.container-principal').fadeIn(1000);
			window.history.pushState('','',contato);
			return false;
		})
	}
})