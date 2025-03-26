function vw_home_renovation_menu_open_nav() {
	window.vw_home_renovation_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function vw_home_renovation_menu_close_nav() {
	window.vw_home_renovation_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},
		speed: 'fast'
 	});
});

jQuery(document).ready(function () {
	window.vw_home_renovation_currentfocus=null;
  	vw_home_renovation_checkfocusdElement();
	var vw_home_renovation_body = document.querySelector('body');
	vw_home_renovation_body.addEventListener('keyup', vw_home_renovation_check_tab_press);
	var vw_home_renovation_gotoHome = false;
	var vw_home_renovation_gotoClose = false;
	window.vw_home_renovation_responsiveMenu=false;
 	function vw_home_renovation_checkfocusdElement(){
	 	if(window.vw_home_renovation_currentfocus=document.activeElement.className){
		 	window.vw_home_renovation_currentfocus=document.activeElement.className;
	 	}
 	}
 	function vw_home_renovation_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.vw_home_renovation_responsiveMenu){
			if (!e.shiftKey) {
				if(vw_home_renovation_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				vw_home_renovation_gotoHome = true;
			} else {
				vw_home_renovation_gotoHome = false;
			}

		}else{

			if(window.vw_home_renovation_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.vw_home_renovation_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.vw_home_renovation_responsiveMenu){
				if(vw_home_renovation_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					vw_home_renovation_gotoClose = true;
				} else {
					vw_home_renovation_gotoClose = false;
				}

			}else{

			if(window.vw_home_renovation_responsiveMenu){
			}}}}
		}
	 	vw_home_renovation_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
	
});

// search

jQuery(document).ready(function () {
  function vw_home_renovation_search_loop_focus(element) {
	  var vw_home_renovation_focus = element.find('select, input, textarea, button, a[href]');
	  var vw_home_renovation_firstFocus = vw_home_renovation_focus[0];
	  var vw_home_renovation_lastFocus = vw_home_renovation_focus[vw_home_renovation_focus.length - 1];
	  var KEYCODE_TAB = 9;

	  element.on('keydown', function vw_home_renovation_search_loop_focus(e) {
	    var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

	    if (!isTabPressed) {
	      return;
	    }

	    if ( e.shiftKey ) /* shift + tab */ {
	      if (document.activeElement === vw_home_renovation_firstFocus) {
	        vw_home_renovation_lastFocus.focus();
	          e.preventDefault();
	        }
	      } else /* tab */ {
	      if (document.activeElement === vw_home_renovation_lastFocus) {
	        vw_home_renovation_firstFocus.focus();
	          e.preventDefault();
	        }
	      }
	  });
	}

	jQuery('.search-box span a').click(function(){
    jQuery(".serach_outer").slideDown(1000);
  	vw_home_renovation_search_loop_focus(jQuery('.serach_outer'));
  });
  jQuery('.closepop a').click(function(){
    jQuery(".serach_outer").slideUp(1000);
  });

});

// slick slider

jQuery(".slider").slick({
  infinite: true,
  arrows: false,
  dots: false,
  autoplay: false,
  speed: 800,
  slidesToShow: 1,
  slidesToScroll: 1,
});

// progress bar slider
 //ticking machine
  var vw_home_renovation_percentTime;
  var vw_home_renovation_tick;
  var vw_home_renovation_time = .1;
  var vw_home_renovation_progressBarIndex = 0;

  jQuery('.progressBarContainer .progressBar').each(function(index) {
      var vw_home_renovation_progress = "<div class='inProgress inProgress" + index + "'></div>";
      jQuery(this).html(vw_home_renovation_progress);
  });

  function vw_home_renovation_startProgressbar() {
      vw_home_renovation_resetProgressbar();
      vw_home_renovation_percentTime = 0;
      vw_home_renovation_tick = setInterval(vw_home_renovation_interval, 10);
  }

  function vw_home_renovation_interval() {
      if ((jQuery('.slider .slick-track div[data-slick-index="' + vw_home_renovation_progressBarIndex + '"]').attr("aria-hidden")) === "true") {
          vw_home_renovation_progressBarIndex = jQuery('.slider .slick-track div[aria-hidden="false"]').data("slickIndex");
          vw_home_renovation_startProgressbar();
      } else {
          vw_home_renovation_percentTime += 1 / (vw_home_renovation_time + 5);
          jQuery('.inProgress' + vw_home_renovation_progressBarIndex).css({
              width: vw_home_renovation_percentTime + "%"
          });
          if (vw_home_renovation_percentTime >= 100) {
              jQuery('.single-item').slick('slickNext');
              vw_home_renovation_progressBarIndex++;
              if (vw_home_renovation_progressBarIndex > 2) {
                  vw_home_renovation_progressBarIndex = 0;
              }
              vw_home_renovation_startProgressbar();
          }
      }
  }

  function vw_home_renovation_resetProgressbar() {
      jQuery('.inProgress').css({
          width: 0 + '%'
      });
      clearInterval(vw_home_renovation_tick);
  }
  vw_home_renovation_startProgressbar();
  // End ticking machine

  // slider small img

  jQuery('.item').click(function () {
  	clearInterval(vw_home_renovation_tick);
  	var vw_home_renovation_goToThisIndex = jQuery(this).find("span").data("slickIndex");
  	jQuery('.single-item').slick('slickGoTo', vw_home_renovation_goToThisIndex, false);
  	vw_home_renovation_startProgressbar();
  });

  var vw_home_renovation_slidesCount = jQuery('.banner-slide').length;
  var vw_home_renovation_totalSlides = vw_home_renovation_slidesCount; // Store the total number of slides

  // Event listener to get current slide number after change
  jQuery('.slider').on('afterChange', function (event, slick, currentSlide) {
  	 

    // Fetch current slide title
    var vw_home_renovation_currentTitle = jQuery('.next-headings span').eq(currentSlide).text();

    // Get the next slide index
    var vw_home_renovation_nextSlide_nextSlide = (currentSlide + 1) % vw_home_renovation_totalSlides; // Loop back to the first slide if it's the last one
    var vw_home_renovation_nextImageSrc = jQuery('.banner-slide img').eq(vw_home_renovation_nextSlide_nextSlide + 1).attr('src');
    var vw_home_renovation_nextTile = jQuery('.next-headings span').eq(vw_home_renovation_nextSlide_nextSlide).text();
    jQuery('.next-image img').attr('src', vw_home_renovation_nextImageSrc);
    jQuery('.next_slide').on('click',function () {
      jQuery('.slider').slick('slickNext'); // Go to the next slide
    });

  });

// tab

jQuery(document).ready(function () {
	jQuery( ".tablinks" ).first().addClass( "active" );
});

function vw_home_renovation_services_tab(evt, cityName) {
  var vw_home_renovation_i, vw_home_renovation_tabcontent, vw_home_renovation_tablinks;
  vw_home_renovation_tabcontent = document.getElementsByClassName("tabcontent");
  for (vw_home_renovation_i = 0; vw_home_renovation_i < vw_home_renovation_tabcontent.length; vw_home_renovation_i++) {
    vw_home_renovation_tabcontent[vw_home_renovation_i].style.display = "none";
  }
  vw_home_renovation_tablinks = document.getElementsByClassName("tablinks");
  for (vw_home_renovation_i = 0; vw_home_renovation_i < vw_home_renovation_tablinks.length; vw_home_renovation_i++) {
    vw_home_renovation_tablinks[vw_home_renovation_i].className = vw_home_renovation_tablinks[vw_home_renovation_i].className.replace(" active", "");
  }
  jQuery('#'+ cityName).show()
  evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
	jQuery('.tabcontent').hide();
	jQuery('.tabcontent:first').show();

	// button js
	jQuery('.features-clicked').on('click', function() {
	  // jQuery(this).toggleClass('show');
	  jQuery('.features-clicked').toggleClass('show');

	  jQuery('.nav-item.dropdown .dropdown-menu').toggleClass('show');
	});
});

// scratch code 

var vw_home_renovation_bridges = document.querySelectorAll(".bridgeContainer");

vw_home_renovation_bridges.forEach(function (bridgeContainer, index) {
	var vw_home_renovation_bridgeCanvas = bridgeContainer.querySelector('.bridge').getContext('2d');
	var vw_home_renovation_brushRadius = (517 / 320) * 5;
	var vw_home_renovation_bottomImage = bridgeContainer.querySelector('.bottomImage');
	var vw_home_renovation_topImage = bridgeContainer.querySelector('.topImage');

	bridgeContainer.style.backgroundImage = `url('${vw_home_renovation_topImage.src}')`;

	vw_home_renovation_bridgeCanvas.drawImage(vw_home_renovation_bottomImage, 0, 0, 517, 320);

	if (vw_home_renovation_brushRadius < 50) {
		vw_home_renovation_brushRadius = 50;
	}

	function vw_home_renovation_detectLeftButton(event) {
		if ('buttons' in event) {
			return event.buttons === 1;
		} else if ('which' in event) {
			return event.which === 1;
		} else {
			return event.button === 1;
		}
	}

	function vw_home_renovation_getvw_home_renovation_BrushPos(xRef, yRef) {
		var vw_home_renovation_bridgeRect = bridgeContainer.getBoundingClientRect();
		return {
			x: Math.floor((xRef - vw_home_renovation_bridgeRect.left) / (vw_home_renovation_bridgeRect.right - vw_home_renovation_bridgeRect.left) * 517),
			y: Math.floor((yRef - vw_home_renovation_bridgeRect.top) / (vw_home_renovation_bridgeRect.bottom - vw_home_renovation_bridgeRect.top) * 320)
		};
	}

	function drawDot(mouseX, mouseY) {
		vw_home_renovation_bridgeCanvas.beginPath();
		vw_home_renovation_bridgeCanvas.arc(mouseX, mouseY, vw_home_renovation_brushRadius, 0, 2 * Math.PI, true);
		vw_home_renovation_bridgeCanvas.fillStyle = '#000';
		vw_home_renovation_bridgeCanvas.globalCompositeOperation = "destination-out";
		vw_home_renovation_bridgeCanvas.fill();
	}

	bridgeContainer.addEventListener("mousemove", function (e) {
		var vw_home_renovation_brushPos = vw_home_renovation_getvw_home_renovation_BrushPos(e.clientX, e.clientY);
		var vw_home_renovation_leftBut = vw_home_renovation_detectLeftButton(e);
		if (vw_home_renovation_leftBut == 1) {
			drawDot(vw_home_renovation_brushPos.x, vw_home_renovation_brushPos.y);
		}
	}, false);

	bridgeContainer.addEventListener("touchmove", function (e) {
  console.log("Touch Move Event Detected");
  e.preventDefault();
  var vw_home_renovation_touch = e.targetTouches[0];
  if (vw_home_renovation_touch) {
    console.log("Touch Position:", vw_home_renovation_touch.pageX, vw_home_renovation_touch.pageY);
    var vw_home_renovation_brushPos = vw_home_renovation_getvw_home_renovation_BrushPos(vw_home_renovation_touch.pageX, vw_home_renovation_touch.pageY);
    console.log("Brush Position:", vw_home_renovation_brushPos.x, vw_home_renovation_brushPos.y);
    drawDot(vw_home_renovation_brushPos.x, vw_home_renovation_brushPos.y);
  }
}, false);
});

// onclick before and text on img
jQuery('.scratch-container').on('click', function () {
  var vw_home_renovation_scratchCardInstruction = jQuery(this).find('.scratch-wrap');
  var vw_home_renovation_before = jQuery(this).find('.before');
  console.log(vw_home_renovation_scratchCardInstruction);
  vw_home_renovation_scratchCardInstruction.css('display', 'none');
  vw_home_renovation_before.css('display', 'none');
});
jQuery('.element').on('touchstart', function () {
  var vw_home_renovation_scratchCardInstruction = jQuery(this).find('.scratch-wrap');
  var vw_home_renovation_before = jQuery(this).find('.before');
  console.log(vw_home_renovation_scratchCardInstruction);
  vw_home_renovation_scratchCardInstruction.css('display', 'none');
  vw_home_renovation_before.css('display', 'none');
});