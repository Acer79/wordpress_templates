/* 
File: assets/js/frontend.js
Description: JS Script for Frontend
Plugin: AD ONE PAGE
Author: AD-Theme.com
*/



jQuery(function($){
if(document.getElementById("adonepage") !== null)
{
	 $(document).ready(function() {

		//window.scrollTo(0,0);

		var stickyNavTop = $('.adonepage-menu').offset().top;  
		  
		var stickyNav = function(){  
		var scrollTop = $(window).scrollTop();  
			   
		if (scrollTop > (stickyNavTop)) {   
			$('.adonepage-menu').addClass('sticky');
			$('.adonepage-menu').removeClass('nosticky');
		} else {  
			$('.adonepage-menu').removeClass('sticky');
			$('.adonepage-menu').addClass('nosticky');   
		}  
		};  
		  
		stickyNav();  
		  
		$(window).scroll(function() {  
			stickyNav();  
		});  
	
	
		$(function(){
			$('.adonepage-menu').slicknav();
		});
	
		
		$('a[href*=#slide]').click(function(event){
    		$('html, body').animate({
        		scrollTop: $( $.attr(this, 'href') ).offset().top
    		}, 500);
    		event.preventDefault();
		});
 
	
	
		var example = $('.sf-menu').superfish({
					//add options here if required
		});
		
		$('.adonepage-parallax').each(function(){
			$(this).parallax(); 
		});
	});


	/* HIGHLIGHT MENU */
	
	// Cache selectors
	var lastId,
		topMenu = $(".menu-container .adop-menu-top"),
		topMenuHeight = topMenu.outerHeight()+15,
		// All list items
		menuItems = topMenu.find("a[href*='#slide']"),
		// Anchors corresponding to menu items
		scrollItems = menuItems.map(function(){
		  		var item = $($(this).attr('href'));
		  		if (item.length) { return item; }
		});

	// Bind click handler to menu items
	// so we can get a fancy scroll animation
	menuItems.click(function(e){
	  var href = $(this).attr('href'),  
		  offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
	  $('html, body').stop().animate({ 
		  scrollTop: offsetTop
	  }, 300);
	  e.preventDefault();
	});
	
	// Bind to scroll
	$(window).scroll(function(){
	   // Get container scroll position
	   var fromTop = $(this).scrollTop()+topMenuHeight;
	   
	   // Get id of current scroll item
	   var cur = scrollItems.map(function(){
		 if ($(this).offset().top < fromTop)
		   return this;
	   });
	   // Get the id of the current element
	   cur = cur[cur.length-1];
	   var id = cur && cur.length ? cur[0].id : "";
	   
	   if (lastId !== id) {
		   lastId = id;
		   // Set/remove active class
		   menuItems
			 .parent().removeClass("active")
			 .end().filter("[href=#"+id+"]").parent().addClass("active");
	   }                   
	});	
	
	if ( screen.availWidth < 1281 ) {
		$('.effects-align-center').removeClass( "notViewed" ).addClass("viewed");
		$('.effects-align-left').removeClass( "notViewed" ).addClass("viewed");
		$('.effects-align-right').removeClass( "notViewed" ).addClass("viewed");
		$('.effects-align-none').removeClass( "notViewed" ).addClass("viewed");
	}
	
}
});