$(function(){
	var abrir = true;
	var windowsTamanho = $(window)[0].innerWidth;
	var alvoTamanhoMenu = (windowsTamanho <= 400) ? 200 : 300;


	if(windowsTamanho <= 768){
		$('.menu').css('width', '0').css('padding', '0');
		abrir = false;

	}

	$('.menu-botao').click(function(){
		if(abrir){
			//menu aberto precisamos fechar e adaptar
			$('.menu').animate({'width':0,'padding':0}, function(){
				abrir = false;
			});
			$('.conteudo,header').css('width','100%');
			$('.conteudo,header').animate({'left':0}, function(){
				abrir = false;
			});
		}else{
			// o menu esta fechado
			$('.menu').css('display', 'block');
			$('.menu').animate({'width':alvoTamanhoMenu+'px','padding-top':'10px'}, function(){
				abrir = true;
			});
			if(windowsTamanho > 768)
				$('.conteudo,header').css('width','calc(100% - 300px)');
				$('.conteudo,header').animate({'left':alvoTamanhoMenu+'px'}, function(){
				abrir = true;
			
		});
	}

	})

	$(window).resize(function() {
		windowsTamanho = $(window)[0].innerWidth;
		alvoTamanhoMenu = (windowsTamanho <= 400) ? 200 : 300;
		if (windowsTamanho <= 768) {
			$('.menu').css('width', '0').css('padding', '0');
			$('.conteudo,header').css('width','100%').css('left','0');
			abrir = false;
		}else{
			$('.menu').animate({'width':alvoTamanhoMenu+'px','padding-top':'10px'}, function(){
				abrir = true;
			});
				$('.conteudo,header').css('width','calc(100% - 300px)');
				$('.conteudo,header').animate({'left':alvoTamanhoMenu+'px'}, function(){
				abrir = true;
			});
		}
		
	})



	$('[formato=data]').mask('99/99/9999');

	$('[actionBotao=deletar').click(function(){
		var txt;
		var r = confirm("Deseja excluir o registro?");
		if(r == true) {
			return true;
		}else{
			return false;
		}
	})
})