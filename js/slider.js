$(function(){
	
	var iniciarSlide = 0;

	var maxSlide = $('.banner-single').length - 1;
	
	var tempo = 3;

	esconderSlider();
	mudarSlide();

	function esconderSlider(){
		$('.banner-single').hide();
		$('.banner-single').eq(0).show();
		for (var i = 0; i < maxSlide+1; i++){
			var content = $('.bullets').html();
		if(i == 0)
			content+='<span class="slider-ativo"></span>';		
		else
			content+='<span></span>';
			$('.bullets').html(content);
		}	
	}

	function mudarSlide(){
		setInterval(function(){
			$('.banner-single').eq(iniciarSlide).stop().fadeOut(2000);
		iniciarSlide++;
		if(iniciarSlide > maxSlide)
			iniciarSlide = 0;
		$('.banner-single').eq(iniciarSlide).stop().fadeIn(2000);
		//troca o bullets da nav do slider
		$('.bullets span').removeClass('slider-ativo');
		$('.bullets span').eq(iniciarSlide).addClass('slider-ativo');
		}, tempo * 1000)
	}

	$('body').on('click','.bullets span', function(){
		var atualSlider = $(this);
		$('.banner-single').eq(iniciarSlide).stop().fadeOut(1000);
		iniciarSlide = atualSlider.index();
		$('.banner-single').eq(iniciarSlide).stop().fadeIn(1000);
		$('.bullets span').removeClass('slider-ativo');
		atualSlider.addClass('slider-ativo');
	});

	})
