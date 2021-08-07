$(document).ready(function() {

    // Category Slider
    $('.doctor_slider').owlCarousel({
        loop:true,
        margin:20,
        nav:true,
        dots: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive:{
          0:{
              items:1
          },
          767:{
              items:2
          },
          1023:{
              items:3
          },
          1400:{
              items:4
          }
        }
    });

    
});


// Open Mobile Menu
function openMenu() {
    var get_nav = document.getElementById( 'mobile_menu' );

    if( get_nav.style.opacity == 0 ) {
        get_nav.style.opacity = 1;
        get_nav.style.visibility = 'visible';
        get_nav.style.width = '100%';
    } else {
        get_nav.style.opacity = 0;
        get_nav.style.visibility = 'hidden';
        get_nav.style.width = 0;
    }
}

// Close Mobile Menu
function closeMenu() {
    var get_nav = document.getElementById( 'mobile_menu' );

    get_nav.style.opacity = 0;
    get_nav.style.visibility = 'hidden';
    get_nav.style.width = 0;
}

// Love react
function loveReact(){
    var love = document.getElementById('heart');
    love.style.color = "red";
}