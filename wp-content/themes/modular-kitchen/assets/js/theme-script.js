function modular_kitchen_openNav() {
  jQuery(".sidenav").addClass('show');
}
function modular_kitchen_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function modular_kitchen_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const modular_kitchen_nav = document.querySelector( '.sidenav' );

      if ( ! modular_kitchen_nav || ! modular_kitchen_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...modular_kitchen_nav.querySelectorAll( 'input, a, button' )],
        modular_kitchen_lastEl = elements[ elements.length - 1 ],
        modular_kitchen_firstEl = elements[0],
        modular_kitchen_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && modular_kitchen_lastEl === modular_kitchen_activeEl ) {
        e.preventDefault();
        modular_kitchen_firstEl.focus();
      }

      if ( shiftKey && tabKey && modular_kitchen_firstEl === modular_kitchen_activeEl ) {
        e.preventDefault();
        modular_kitchen_lastEl.focus();
      }
    } );
  }
  modular_kitchen_keepFocusInMenu();
} )( window, document );

var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(document).ready(function() {
  var owl = jQuery('#kitchen-types .owl-carousel');
    owl.owlCarousel({
      margin: 20,
      nav: true,
      center: true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      loop: true,
      dots:false,
      navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1024: {
          items: 3
      }
    }
  })
})

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
  jQuery(".loading2").delay(2000).fadeOut("slow");
});

if(document.getElementById("openModalButton")) {
  if(document.getElementById("openModalButton").getAttribute('data-modal-src')) {
    var modal=document.getElementById("myModal")
    var openModalButton=document.getElementById("openModalButton")
    var closeModalButton=document.getElementById("closeModalButton");
    openModalButton.addEventListener("click",function(){
      let e=jQuery(this).attr("data-modal-src");
      document.getElementById("videoPlayer").src=e
      modal.style.display="block"
    })
    closeModalButton.addEventListener("click",function(){
      document.getElementById("videoPlayer").src=""
      modal.style.display="none"
    })
    window.addEventListener("click",function(e){
      if(e.target==modal) {
        modal.style.display="none"
      } else {
        document.getElementById("videoPlayer").src=""
      }
    });
  }
}