<?PHP
include "dirtbikeHeader.php";
?>
	
	<header id="tagline">
	 <img src="img/heads1.jpg">
	 <img src="img/d8.jpg"id="heads">
	 <img src="img/heads1.jpg">
	<header>
	
<!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
<!---------left column--------------->
<div class="row" id ="tagline">
  <div class="col-xs-6 col-md-4">
  <h1>Dirtbikes!</h1>
  <img src="img/d7.jpg">
  <br>
  <h2>Freestyle</h2>
  <p>
Freestyle Motocross (FMX), a relatively new variation of supercross, started out by the South African champion, 
Marco Urzi, does not involve racing and instead it concentrates on performing acrobatic stunts while jumping motocross bikes. 
The winner is chosen by a group of judges. The riders are scored on style, level of trick difficulty, 
best use of the course, and, frequently, crowd reactions. FMX was introduced to the X Games and mainstream audiences in 1999.</p>
  
  </div>
<!---------middle column--------------->

  <div class="col-xs-6 col-md-4">
  <h1>Tracks!</h1>
  <!------>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/t1.jpg" alt="Cool">
    </div>

    <div class="item">
      <img src="img/t2.jpg" alt="wow">
    </div>

    <div class="item">
      <img src="img/t3.jpg" alt="woot">
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <!------->
  <br>
  <img src="img/d10.jpg" width="350">
  </div>
 
  
<!---------Right column--------------->
  <div class="col-xs-6 col-md-4">
  <h1>Gear!</h1>
   <img src="img/d9.jpg">
   <br>
   <p>It’s time for brands to start rolling out some sweet new motocross gear for 2016. With so many options it can get overwhelming, 
   we know. To help you get a wide angle of what’s out there, we’ve put together our guide for 2016 Motocross Gear Combos.
   We’ve packed it with some of our favorite combos so you can have a good sampling from several of the major manufacturers.
   We can’t fit every new release in here, so visit Secret Store to see the entire lineup of new 
   2016 motocross gear. Now sit back, relax, and get ready to make some space in your gear bag.
  </div>
 
</div>

<?PHP include"dirtbikeFooter.php" ?>