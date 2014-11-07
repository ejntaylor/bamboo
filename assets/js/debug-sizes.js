jQuery(document).ready(function($) {
    // Code here will be executed on document ready. Use $ as normal.
    


  
$("a.remove").click( function() {

	  $(this).closest('.site_tester').remove();
	  $('#overlay').remove();


});

// screen sizes

    
   var docHeight = $(document).height();

   $("body").append("<div id='overlay'></div>");

   $("#overlay")
      .height(docHeight)
      .css({
         'opacity' : 0.7,
         'position': 'absolute',
         'top': 0,
         'left': 0,
         'background-color': '#fff',
         'width': '100%',
         'z-index': 9000
      });
      
      	   $("a.phonev").click( function() {
		  	  $('.site_tester').addClass( 'phonev' )
		  	  $('.site_tester').removeClass( 'phoneh' )
		  	  $('.site_tester').removeClass( 'tabletv' )
		  	  $('.site_tester').removeClass( 'tableth' )
		  	  $('.site_tester a').not(this).removeClass('active');
			  $(this).toggleClass('active');
    

	   });

      	   $("a.phoneh").click( function() {
		  	  $('.site_tester').removeClass( 'phonev' )
		  	  $('.site_tester').addClass( 'phoneh' )
		  	  $('.site_tester').removeClass( 'tabletv' )
		  	  $('.site_tester').removeClass( 'tableth' )
		  	  $('.site_tester a').not(this).removeClass('active');
			  $(this).toggleClass('active');		  	  
		  	  
		  	  

	   });
	   
      	   $("a.tabletv").click( function() {
		  	  $('.site_tester').removeClass( 'phonev' )
		  	  $('.site_tester').removeClass( 'phoneh' )
		  	  $('.site_tester').addClass( 'tabletv' )
		  	  $('.site_tester').removeClass( 'tableth' )
		  	  $('.site_tester a').not(this).removeClass('active');
			  $(this).toggleClass('active');
	   });

      	   $("a.tableth").click( function() {
		  	  $('.site_tester').removeClass( 'phonev' )
		  	  $('.site_tester').removeClass( 'phoneh' )
		  	  $('.site_tester').removeClass( 'tabletv' )
		  	  $('.site_tester').addClass( 'tableth' )
		  	  $('.site_tester a').not(this).removeClass('active');
			  $(this).toggleClass('active');
	   });
	   
	   	   
	   

// remove on click off or outside the iframe


$(document).click(function() {
	  $('.site_tester').remove();
	  $('#overlay').remove();
	  $('body').removeClass( 'noscroll' );

	  });

$(".site_tester").click(function(event) {
    event.stopPropagation();
});


});