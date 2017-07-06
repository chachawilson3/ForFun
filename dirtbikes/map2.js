		$(document).ready(function(){
			var mapOptions = {
				zoom: 11, 
				
				center: new google.maps.LatLng(44.278323, -73.223310),
				mapTypeId: google.maps.MapTypeId.TERRAIN
			};

			
			var map = new google.maps.Map($("#map").get(0), mapOptions);
		});

	