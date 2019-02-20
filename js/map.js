var map;

	function inicialize() {
		var mapProp = {
			center:new google.maps.LatLng(-27.609959,-48.576585),
			zoom:14,
			scrollwheel: false,
			styles: [{
			stylers: [{
				saturation: -100
			}]
			}],
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};

		map=new google.maps.Map(document.getElementById("map"),mapProp);
	}

		function addMarcacao(lat,long,icon,content,showInfoWindow,openInfoWindow){
			var minhaLatLng = {lat:lat,lng:long};

			if(icon === ''){
				var marker = new google.maps.Marker({
					position: minhaLatLng,
					map: map,
					icon: icon
				});
			}else{
				var marker = new google.maps.Marker({
					position: minhaLatLng,
					map: map,
					icon: icon
				});
			}

			var infoWindow = new google.maps.infoWindow({
				content: content,
				maxWidth:200
			});

			google.maps.event.addListener(infoWindow, 'donready', function(){
				var iwOuter = $('.gn-style-iw');

				var iwBackground = iwOuter.prev();

				iwBackground.children('nth-child(2)').css({'background' : 'rgb(255,255,255)'}).css({'border-radius':'0px'});

				iwBackground.children('nth-child(4)').css({'background' : 'rgb(255,255,255)'}).css({'border-radius':'0px'});

				iwBackground.children('nth-child(1)').attr('style', function(i,s){ return s + 'display:none;'});

				iwBackground.children('nth-child(3)').attr('style', function(i,s){ return s + 'display:none;'});
		});
				if(showInfoWindow == undefined){
					google.maps.event.addListener(marker, 'click', function () {
						infoWindow.open(map, marker);
					});
				}else if(openInfoWindow == true){
					infoWindow.open(map, marker);
				}
}

$(function(){
	inicialize();
			addMarcacao(-27.609959,-48.576585,'',"Minha casa",undefined,false);
			

})