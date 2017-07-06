<?PHP
include "dirtbikeHeader.php";
?>
	<script>
	    	$(document).ready(function() {
			$("#accordion").accordion(
				{ 
					event: "click",
					collapsible: true 
				});
	    });
		
		$(document).ready(function() {
			$("#p1").button();
	
			$("#p1").click(function() { 
				$("#dialog").dialog({modal:true});
			});
		});
		
				$(document).ready(function() {
			$("#p2").button();
	
			$("#p2").click(function() { 
				$("#dialog2").dialog({modal:true});
			});
		});
	</script>



<div class="row">
<!--left-->
  <div class="col-md-4">
     <section>
        <h1>What makes our club better than the rest?</h1>       
        <div id="accordion">
		 	<h3><a href="#">Become a pro status member</a></h3>
			<div>
				<p>In this club you have the option to either stay a free basic member with limited access<br>
				Or pay the fee and become a pro status member with access to all of our benefits!
				</p>
			</div>
 			<h3><a href="#">A globally recognized club</a></h3>
			<div>
				<p>The Pro dirtbikers club has been globally recognized as one of the best.<br>
				When your a member of this club, everyone knows your a notch above the rest
				</p>
			</div>
			<h3><a href="#">Make life lasting relationships</a></h3>
			<div>
				<p>Pro club has over 5000 members world wide.<br>
				Meet some of the biggest names in the motocross and freestyle dirtbike world</p>

			</div>
			<h3><a href="#">Enjoy numerous benefits</a></h3>
			<div>
				<p>Gain access to the best private tracks, use the best gear money can buy<br>
				attend tons of races and attractions for even the basic members
				</p>
			</div>
        </div>
    </section>
  </div>
<!--middle-->
  <div class="col-md-4">
  <div id="tabs">
  <ul>
    <li><a href="#fragment-1"><span>Who can join?</span></a></li>
    <li><a href="#fragment-2"><span>How to Join?</span></a></li>
    <li><a href="#fragment-3"><span>What next?</span></a></li>
  </ul>
  <div id="fragment-1">
    
    <p>A: anybody is able to join the Pro Riders club, the only requirement 
	be that you love to watching and riding dirtbikes!</p>
  </div>
  <div id="fragment-2">
   <p>In order to join the Pro riders club you pay the entry fee and sign up <a class="txt" href="contact.php" title="here!">here!</a></p>
  </div>
  <div id="fragment-3">
  <p>Get your friends to join up, Find a track to rent for your group and start riding!<p>
  </div>
  <script>
$( "#tabs" ).tabs();
</script>
</div>

  </div>
<!--right-->
  <div class="col-md-4">
     <section>
    	<h1>Featured Track of the month</h1>
        <a id="p1"><img src="img/mudTrack.jpg" alt="Premium mudders track" width="380" height="200" /></a>
        <div id="dialog" title="Mudders Trails" style="display: none;">
            <p>Take a ride down to our personally groomed mud tracks and take a ripper bud</p>
        </div>
        <br><br>
		    	<h2 id="tagline">Most popular</h2>
        <a id="p2"><img src="img/t3.jpg" alt="Premium moto track" width="380" height="200" /></a>
        <div id="dialog2" title="Pro Racer Trail" style="display: none;">
            <p>Practice your riding skills on our proffessional level racing moto track</p>
        </div>
    </section>	
  </div>
</div>



	<footer id="tagline">
	<p>Offroad Sports Club</p>
	<p>888-8888</p>
	<p>Vermont</p>
	</footer>


  </body>
</html>