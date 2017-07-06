	$(document).ready(function() {
	// create an array of the slide images
	var image, imageCache = [];
	$("#slides2 img").each(function() {	
		image = new Image();
        image.src = $(this).attr("src");
        image.title = $(this).attr("alt");
        imageCache.push( image );
   	});
	
	// start slide show
	var imageCounter = 0;
	var nextImage;
    var  timer = setInterval(
        function () {
        	$("#caption").fadeOut(1000);
        	$("#slide2").fadeOut(1000,
				function() {
					imageCounter = (imageCounter + 1) % imageCache.length;
		        	nextImage = imageCache[imageCounter];
			    	$("#slide2").attr("src", nextImage.src).fadeIn(1000);
				    $("#caption").text(nextImage.title).fadeIn(1000);		
				}        	
        	);
        },	
    5000);
})