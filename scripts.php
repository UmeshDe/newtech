<script type="text/javascript" src="js/jquery.js"></script>  
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>

<script type="text/javascript" src="js/jquery.ui.totop.js"></script>
<script type="text/javascript" src="js/camera.js"></script>
<script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>

<script type="text/javascript" src="js/touchTouch.jquery.js"></script>
<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="js/cform.js"></script>
<script>
$(document).ready(function() {
	/////// icons
	$(".social li").find("a").css({opacity:0.6});
	$(".social li a").hover(function() {
		$(this).stop().animate({opacity:1 }, 400, 'easeOutExpo');		    
	},function(){
	    $(this).stop().animate({opacity:0.6 }, 400, 'easeOutExpo' );		   
	}); 

	// camera
	$('#camera_wrap').camera({
		//thumbnails: true
		autoAdvance			: true,		
		mobileAutoAdvance	: true,
		height: '37%',
		hover: false,
		loader: 'none',
		navigation: false,
		navigationHover: false,
		mobileNavHover: false,
		playPause: false,
		pauseOnClick: false,
		pagination			: true,
		time: 7000,
		transPeriod: 1000,
		minHeight: '300px'
	});

	

}); 
$(window).load(function() {
	var $container = $('#isotope-items'),
		$optionSet = $('#isotope-options'), 
	    $optionSets = $('#isotope-filters'), 
	    $optionLinks = $optionSets.find('a'); 
    $container.isotope({ 
        filter: '*',
        layoutMode: 'fitRows'
    });  
   	$optionLinks.click(function(){ 
   		var $this = $(this); 
    	// don't proceed if already selected 
		if ( $this.hasClass('selected') ) { 
			return false; 
		}    		
   		$optionSet.find('.selected').removeClass('selected'); 
   		$this.addClass('selected');

        var selector = $(this).attr('data-filter'); 
        $container.isotope({ 
            filter: selector            
        }); 
      	return false; 
    });    	
	$(window).on("resize", function( event ) {	
		$container.isotope('reLayout');		
	});		

	// touchTouch
	$('.thumb-isotope .thumbnail a').touchTouch();

}); 
</script>