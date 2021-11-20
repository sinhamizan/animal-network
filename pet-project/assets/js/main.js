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


    function load_data() {
        var post_love2 = $('#post_id_love').val();
        $.ajax({
            url: 'love-load.php',
            type: 'POST',
            data: {post_love:post_love2},
            success: function(data) {
                $('#show_love_all').html(data)
            }
        })
    }
    load_data();


    // Love React
    $('.love_react').on('click', function(e){
        e.preventDefault(); 
        var post = $(this).attr('data');

        $.ajax({
            url: 'love.php',
            type: 'POST',
            data: { post:post },
            success: function(data) {
                if( data == 1 ) {
                    $('#heart_react').css('color', 'red');
                }else{
                    alert("Don't added!");
                }
            }
        })
    });


    // Love Back
    $('.love_back').on('click', function(e){
        e.preventDefault(); 
        var post = $(this).attr('data');

        $.ajax({
            url: 'love-back.php',
            type: 'POST',
            data: { post:post },
            success: function(data) {
                if( data == 1 ) {
                    $('#heart_back').css('color', '#8C52FF');
                }else{
                    alert("Don't added!");
                }
            }
        })
    });

    // submit comment
    $('#submit_comment').on( 'click', function(e){
        e.preventDefault();

        var comment = $('#comment').val();
        var post = $(this).attr('data');

        $.ajax({
            url: 'comment.php',
            type: 'post',
            data: { comment: comment, post: post, },
            success: function(data) {
                if(data == 1){
                    alert("Your comment is added");
                } else {
                    alert("Your comment don't added, Please try again!");
                }
            }
        });
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


