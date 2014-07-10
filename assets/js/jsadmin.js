jQuery(document).ready(function($) {
	// Code here will be executed on document ready. Use $ as normal.
	// Browser Size  

	function jqUpdateSize() {
		// Get the dimensions of the viewport
		var width = $(window).width();
		var height = $(window).height();
		$('#jqWidth').html(width); // Display the width
		$('#jqHeight').html(height); // Display the height
	};
	$(document).ready(jqUpdateSize); // When the page first loads
	$(window).resize(jqUpdateSize); // When the browser changes size
	// Toggle Debug CSS  
	
	var className;
	$('.stylesCSSToggle').click(function() {
		$('html').each(function() {
			var classes = ['bb_debug', 'bb_debug2', 'bb_debug3', ''];
			this.className = classes[($.inArray(this.className, classes) + 1) % classes.length];
			
		});
		
		var $html = $("html");
		$('a').click(function(e) {
		    if($html.hasClass('bb_debug') || $html.hasClass('bb_debug2') || $html.hasClass('bb_debug3')) {

		    e.preventDefault();
		    //do other stuff when a click happens
		    }
		});
		
	if ($html.hasClass('bb_debug') || $html.hasClass('bb_debug2') || $html.hasClass('bb_debug3')) {

		//alert('hello');
		$('.element-hover').show();


				var currentNode = null;
				$('body').click(function(event) {
					if ($(event.target) !== currentNode) {
						currentNode = $(event.target);
						htmlText = $('<div>').append($(currentNode).clone().empty()).html();
						//  console.log(htmlText);
						$('.element-hover').text(htmlText);
					}
				});
			}
			
			else {
				$('.element-hover').hide();
		$('a').click(function(e) {
		    return true;
		    //do other stuff when a click happens
		});			
		
		}

	
		
		
	});
	

	//
	// Hooks Hover
	$('.debug-hooks i.fa-dot-circle-o').click(function() {
		$("div.debug-hooks pre.action").toggleClass('inline');
		$("div.debug-hooks").toggleClass('inline');
		$('div.debug-hooks').children('.hook_functions.display').toggleClass('display');
		$('div.debug-hooks').find('.fa-angle-down').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
	})
	$('.debug-hooks .debugHookToggle').click(function() {
		$(this).closest('.debug-hooks').find('.hook_functions').toggleClass('display');
		$(this).closest('.debug-hooks').find('.hooks-advanced').toggleClass('fa-angle-up');
		$(this).closest('.debug-hooks').find('.hooks-advanced').toggleClass('fa-angle-down');
	})
	$('.debug-hooks i.debugHookTogglea').click(function() {
		$(this).closest('.debug-hooks').find('.hook_functions').toggleClass('display');
		$(this).closest('.debug-hooks').find('.fa-angle-down').toggleClass('debugHide');
		$(this).closest('.debug-hooks').find('.fa-angle-up').toggleClass('debugHide');
	})
	// toggle stylehseet
	$(function() {
		// Call stylesheet init so that all stylesheet changing functions 
		// will work.
		$.stylesheetInit();
		// This code loops through the stylesheets when you click the link with 
		// an ID of "toggler" below.
		$('.styleSwitcher').bind('click', function(e) {
			//alert ('test2');
			$.stylesheetToggle();
			return false;
		});
		// When one of the styleswitch links is clicked then switch the stylesheet to
		// the one matching the value of that links rel attribute.
		$('.styleswitch').bind('click', function(e) {
			$.stylesheetSwitch(this.getAttribute('rel'));
			return false;
		});
	});
	/**
	 * Stylesheet toggle variation on styleswitch stylesheet switcher.
	 * Built on jQuery.
	 * Under an CC Attribution, Share Alike License.
	 * By Kelvin Luck ( http://www.kelvinluck.com/ )
	 * Modified - Bamboo
	 **/
	(function($) {
		// Local vars for toggle
		var availableStylesheets = [];
		var activeStylesheetIndex = 0;
		// To loop through available stylesheets
		$.stylesheetToggle = function() {
			activeStylesheetIndex++;
			activeStylesheetIndex %= availableStylesheets.length;
			$.stylesheetSwitch(availableStylesheets[activeStylesheetIndex]);
		};
		// To switch to a specific named stylesheet
		$.stylesheetSwitch = function(styleName) {
			//works
			$('link[rel*=stylesheet]').each(

			function(i) {
				//this.disabled = true;
				if (this.getAttribute('id') == styleName) {
					//this.disabled = false;
					var $this = $(this);
					if ($this.attr('disabled')) {
						$this.removeAttr('disabled');
						$('.styleswitch[rel=' + styleName + ']').toggleClass("disabled");
						// $('.styleswitch').toggleClass("disabled"); 
					} else {
						$this.attr('disabled', 'disabled');
						$('.styleswitch[rel=' + styleName + ']').toggleClass("disabled");
					}
					activeStylesheetIndex = i;
				}
			});
			createCookie('style', styleName, 365);
		};
		// To initialise the stylesheet with it's 
		$.stylesheetInit = function() {
			$('link[rel*=style][class*=switch]').each(

			function(i) {
				availableStylesheets.push(this.getAttribute('id'));
			});
			var c = readCookie('style');
			if (c) {
				//$.stylesheetSwitch(c);
			}
		};
	})(jQuery);
	// cookie functions http://www.quirksmode.org/js/cookies.html

	function createCookie(name, value, days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			var expires = "; expires=" + date.toGMTString();
		} else var expires = "";
		document.cookie = name + "=" + value + expires + "; path=/";
	}

	function readCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	}

	function eraseCookie(name) {
		createCookie(name, "", -1);
	}
	// /cookie functions
	// toggle sidebar slide 
	$(".slidetoggle-close").click(function() {
		//$(this).parent().animate({left:'-300px'}, {queue: false, duration: 500}); 
		$('.slidetoggle-open').animate({
			left: '0px'
		}, {
			queue: false,
			duration: 500
		});
		$("#sideWrapper").animate({
			left: '-800px'
		}, {
			queue: false,
			duration: 500
		});
	});
	$(".slidetoggle-open").click(function() {
		$(this).closest("#sideWrapper").animate({
			left: '0px'
		}, {
			queue: false,
			duration: 500
		});
		//$("#sideWrapper").not($(this).parent()).animate({left:'-300px'}, {queue: false, duration: 500});
		$(this).animate({
			left: '-800px'
		}, {
			queue: false,
			duration: 500
		});
		//$(this).animate({left:'-50px'}, {queue: false, duration: 50}); 
		//$("#sideWrapper").animate({left:'-280px'}, {queue: false, duration: 500}); 
	});
	// toggle sidebar tabs
	$('.switchNav i').click(function() {
		$('#switchWrapper > div').hide();
		$('.switchNav i').removeClass('active')
		$(this).addClass('active')
		$('.switchBambino').show();
		var switchClass = $(this).attr("class").split(' ')[0]; //find the divs with this class name
		//alert('test'+switchClass);
		$('#switchWrapper .' + switchClass).show();
		//$('#switchWrapper').hasClass(switchClass).show();
	});
	// stylesheet print out
	$('link[rel=stylesheet]').each(function(index, value) {
		// searches url to show child theme css files
		var val = $(this).attr('href');
		var patternC = new RegExp(childDir);
		var patternP = new RegExp(templateDir);
		var existsC = patternC.test(val);
		var existsP = patternP.test(val);
		if (existsC) {
			$(".switchChildlist table").append('<tr class="styleswitch"  rel="' + $(this).attr('id') + '"><td>' + index + '</td><td>' + $(this).attr('id') + '</td></a></tr>');
			//console.log(val);
		}
		if (existsP) {
			$(".switchParentlist table").append('<tr class="styleswitch"  rel="' + $(this).attr('id') + '"><td>' + index + '</td><td>' + $(this).attr('id') + '</td></a></tr>');
			//console.log(val);
		}
		$(".styleprint table").append('<tr class="styleswitch"  rel="' + $(this).attr('id') + '"><td>' + index + '</td><td>' + $(this).attr('id') + '</td></a></tr>');
	});
/* js print orig

$('script').each(function(index, value) { 

var src = $(this).attr('src');
	//src = src.replace(/https?:\/\/[^\/]+/i, "");
	$(".jsprint ul").append('<li><span>' + index + ': ' + src + '</span></li>'); 
});


*/
	// replace scripts for print js

	function getUrlParameters(parameter, staticURL, decode) {}

	function getDomain(url) {
		var s = url.substr(0, 8),
			d;
		try {
			if (s.search('http://') < 0 && s.search('https://') < 0 && s.search('ftp://') < 0) {
				s = "http://" + url;
			} else {
				s = url;
			}
			d = s.match(/:\/\/(www[0-9]?\.)?(.[^/:]+)/)[2];
		} catch (e) {
			d = "";
		}
		return d;
	}
	// js print out
	$('script').each(function(index, value) {
		var src = $(this).prop('src');
		src = src || 'na?ver=N/A';
		//console.log(src);
		var version = getUrlParameters("ver", src, true);
		if (src == 'na?ver=N/A') {
			urlstrip = 'Style Injected';
			src = '#';
		} else {
			urlstrip = src.substr(10);
			urlstrip = urlstrip.substr(urlstrip.indexOf('/'));
			urlstrip = urlstrip.slice(0, urlstrip.indexOf('?'));
		}
		//src = src.replace(/https?:\/\/[^\/]+/i, "");
		$(".jsprint table").append('<tr><td>' + (index + 1) + '</td><td><a href="' + src + '" target="_blank">' + urlstrip + '</a></td><td>' + version + '</td></tr>');
	});
	// screen sizes - hide the mobile info if in iframe
	var isInIFrame = (window.location != window.parent.location);
	if (isInIFrame == true) {
		$(".debug-size").hide();
		$(".debug-size.actual-size").show();
		$(".slidetoggle").hide();
	} else {}
	// screen size - load ajax on click 
	$(".ajaxload").click(function() {
		$("#sideWrapper").animate({
			left: '-600px'
		}, {
			queue: false,
			duration: 500
		});
		$('.slidetoggle-open').animate({
			left: '0px'
		}, {
			queue: false,
			duration: 500
		});
		$('body').addClass('noscroll');
		$(".screen_size_div").load('/wp-content/plugins/bamboo/includes/debug-size.php');
	});
	// Styles - Advanced Toggle
	$(".styletheme i").click(function() {
		$(".styletheme .stylesToggle").toggle();
	});
	
	
	
	
	// draggable (uses jquery ui)
	
    $( "#sideWrapper" ).draggable();



	
	
});