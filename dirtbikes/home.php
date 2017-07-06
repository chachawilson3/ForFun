<?PHP
include "dirtbikeHeader.php";
?>
	<script>
			$(document).ready(function(){
			var geocoder = new google.maps.Geocoder();
		
			var myLatLng = new google.maps.LatLng(44.421579, -71.888163);
			geocoder.geocode({location: myLatLng}, function(results) {
			
				var mapOptions = {zoom: 8, center: myLatLng, mapTypeId: google.maps.MapTypeId.ROADMAP}
				var map = new google.maps.Map($("#map").get(0), mapOptions);
			
				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map		
					});			

				var content = '<p>Pro Club Headquaters</p> <img src="img/hq.jpg"><p>Concord, Vermont</p>	';
				var infowindow = new google.maps.InfoWindow({
				content: content
				});
				
				marker.addListener('click', function() {
				infowindow.open(map, marker);
				});
			});		
		});

	</script>

 
 <style>
 #map {
margin-left: auto;
margin-right:auto;
width: 500px;
height: 400px;   	  
}
 
 #social{
 width:100px;
 height: 100px;
 padding: 10px;
 }
 img{
	width: 250px;
	height: 100px;
 }
 ul{
 list-style-type: none;
 }
 
 </style>
 
 

	
	<header id="tagline">
	

	<div>
	<h1 class="text"> World of Dirtbikes, <br> Pro Club</h1>
	</div>
	<img class="Hsize" id="slide2" src="img/rider1.jpg" alt="">
    <div id="slides2"> 
        <img src="img/rider1.jpg" >
        <img src="img/rider2.png" >
    </div>
	

	</header>

	
<div class="row">
<!--left--------------------------------------->
<div id="1">
	<div class="col-md-2">
	
	<h1>Tons of benefits</h1>
	<ul>
		<li> training </li>
		<li> benefits </li>
		<li> eligibility </li>
		<li> contact info </li>
		<li> jobs </li>
		<li> values </li>
	</ul>
	<br>
	<form>
	<h1>SIGN UP NOW</h1>
		Name: <input type='text' name='fullName'>
	</form>
	</div>
  </div>
  
  
<!--middle------------------------------------->
  <div class="col-md-7" id="tagline">

	<br><br>
	<h1> Pro Biker Track Locations </h1>
	<h2> Vermont </h2>
   	<div id="map"></div>
	
	
  </div>
<!--right--------------------------------------->
  <div class="col-md-3" id="tagline"> 
  <h1>Access to private tracks</h1>
  <section>
    <img id="slide" src="img/d1.jpg" alt="">
    <div id="slides"> 
        <img src="img/d1.jpg" alt="">
        <img src="img/d2.jpg" alt="">
        <img src="img/d3.jpg" alt="">
    </div>
	</section>
	<br><br>
  <h1>learn more, sign up now</h1>
<form class="form-horizontal" id="p1">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputname" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="name" class="form-control" id="inputname" placeholder="name">
    </div>
  </div>
    <div class="form-group">
    <label for="inputname" class="col-sm-2 control-label">Why do you like dirtbikes?</label>
    <div class="col-sm-10">
     <textarea class="form-control" rows="3"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
  </div>
</div>

<div class="row">
 <div class="col-xs-12 col-sm-6 col-md-8"><img src="img/s1.jpg" id="social"></div>
  <div class="col-xs-6 col-md-4"></div>
</div>
	
<?PHP include"dirtbikeFooter.php" ?>
