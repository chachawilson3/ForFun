<?PHP
include "dirtbikeHeader.php";
?>
		<script>
		$(document).ready(function(){
			var marker;
			var geocoder = new google.maps.Geocoder();
			var myLatlng = new google.maps.LatLng(44.420751, -71.886696);
			var mapOptions = {zoom: 8, center: myLatlng, mapTypeId: google.maps.MapTypeId.ROADMAP}
			var map = new google.maps.Map($("#map").get(0), mapOptions);
		
			$("#links a").click(function() {
				var address = $(this).text();
				if (marker) { marker.setMap(null); }
				geocoder.geocode({address: address}, function(results) {
			    	marker = new google.maps.Marker({
				    	position: results[0].geometry.location,
			    		map: map
			    	});
					var infoWindow = new google.maps.InfoWindow({
						content: "Location:<h3>" + address + "</h3>"}
			    	);
			    	infoWindow.open(map, marker);
		    	});
			});
		});	
		</script>
		<script>

			function getPic(){
				document.getElementById('output1').innerHTML = 'Concord, Vt<br>Pros only track';
				document.img1.src ="img/d1.jpg";
				}
				
				function getPic2(){
				document.getElementById('output1').innerHTML = 'Lyndonville, Vt<br>Sandy Uphill track';
				document.img1.src ="img/t2.jpg";
				}
			
			function getPic3(){
				document.getElementById('output1').innerHTML = 'Burlington, Vt<br>Competitive Race track';
				document.img1.src ="img/t3.jpg";
				}
				
				function getPic4(){
				document.getElementById('output1').innerHTML = 'Danville, Vt<br>Mudders track';
				document.img1.src ="img/mudTrack.jpg";
				}
				
				function getPic5(){
				document.getElementById('output1').innerHTML = 'Rutland, Vt<br>Freestyle track';
				document.img1.src ="img/d3.jpg";
				}
		
	</script>
	
	
	    <style>
    	#map {
			margin-top: 30px;
			margin-left: auto;
			margin-right:auto;
    		width: 500px;
    		height: 400px;
			float:left;
    	}
		h1, h2{ text-align: center; }

    </style>
	
	
	

	

<div class="row">
<!--left column-->
<div class="col-md-2">
<div class="this">
<ul id="links">
        <button onclick="getPic()"><li><a href="#">Concord, VT</a></li></button>
        <button onclick="getPic2()"><li><a href="#">lyndonville, VT</a></li></button>
         <button onclick="getPic3()"><li><a href="#">Burlington, VT</a></li></button>
         <button onclick="getPic4()"><li><a href="#">Danville, VT</a></li></button>
		 <button onclick="getPic5()"><li><a href="#">Rutland, VT</a></li></button>

    </ul>
</div>
</div>
<!--middle column-->
<div class="col-md-4">
<h2>All locations</h2>
<div id="map"></div>

</div>
	 <!--right column-->
<div class="col-md-6">
<div id="poo">
<h2 id="output1">Track identifiers</h2>
<a href="javascript:getPic()" ><img name="img1" src="img/d3.jpg" height="300" width="300"></a> 
</div>
</div>

<!--outside the columns-->
</div>

<?PHP include"dirtbikeFooter.php" ?>