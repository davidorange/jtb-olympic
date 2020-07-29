<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="robot" content="index, follow" />
    <meta name="generator" content="Brackets">
    <meta name='copyright' content='Orange Technology Solution co.,ltd.'>
    <meta name='designer' content='David M.'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="image/ico" rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <title>@yield('pageTitle', 'Default Title')</title>
  </head>
  <body>
    <div class="container-fluid">
        <header class="row">
            <nav class="col-12 mainnav">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-8 col-md-4 col-lg-3 logo">
                                <a href="home">
                                    <figure>
                                        <img src="{{asset('assets/images/logo-jtb.svg')}}">
                                    </figure>
                                </a>
                            </div>
                            <div class="col-4 col-md-8 col-lg-9 wrap_mainmenu">
                                <div class="mainmenu">
                                    <ul>
                                        <li>
                                            <a href="home">Home</a>
                                        </li>
                                        <li class="hassub">
                                            <a href="javascript:;">about</a>
                                            <ul class="submenu">
                                                <li><a href="about">about submenu</a></li>
                                                <li><a href="about">about submenu2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="btn_mainmenu">
                                        <div class="button_menu">
                                            <div class="menu_symbol"><span></span><span></span><span></span></div><div class="menu_text">MENU</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="content">
            @yield('content')
        </div>
        <footer class="row">
            <div class="col-12">footer</div>
        </footer>
    </div>
      
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.lazy.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/modernizr.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dotdotdot.min.js')}}"></script>
    <script defer src="https://kit.fontawesome.com/3e8060abb4.js" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {

        $('.dotmaster').dotdotdot({
            watch: 'window'
        });

        var mmH = $('.mainnav').height()
        $('.container-fluid').eq(0).css('padding-top', mmH);

        $('.swlang_btn').click(function(){
            $(this).siblings('ul').slideToggle();    
            event.stopPropagation();
        });
        $('.swlang ul li').click(function(){
            var imglang = $(this).children('img').clone();
            var textlang = $(this).text().substr(0, 2);
            $('.swlang_btn').empty().append(imglang).append(textlang);
            $(this).parent('ul').slideUp();    
            $(this).addClass('selected').siblings('li').removeClass('selected');
        });
        $( '.button_menu' ).click(function (event) {
          if (  $( ".mainmenu > ul" ).is( ":hidden" ) ) {
                $(this).addClass("active");
                $( ".mainmenu > ul" ).slideDown();
          } else {
              $(this).removeClass("active");
              $( ".mainmenu > ul" ).slideUp();
          }
          event.stopPropagation();
        });
        $('html').click(function(){
            $( ".mainmenu > ul .submenu" ).slideUp();  
            $( ".swlang ul" ).slideUp(); 
            if (Modernizr.mq('(max-width: 1024px)')) {
                $('.button_menu').removeClass("active");
                $( ".mainmenu > ul" ).slideUp();  
            }
        });

        if (Modernizr.mq('(max-width: 1024px)')) {
            $('body').css("padding-bottom", $(".wrap_fixed_relatelink").height() - 5);
        }

        $(function() {
            $('img[data-src]:not(.owl-lazy)').Lazy();
        });

        $(function(){
            jQuery('img.svg').each(function(){
                var $img = jQuery(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');

                jQuery.get(imgURL, function(data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = jQuery(data).find('svg');

                    // Add replaced image's ID to the new SVG
                    if(typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if(typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass+' replaced-svg');
                    }

                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');

                    // Check if the viewport is set, else we gonna set it if we can.
                    if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                        $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
                    }

                    // Replace image with new SVG
                    $img.replaceWith($svg);

                }, 'xml');

            });
        });

        $('.mainmenu > ul .hassub').click(function(){
            if (  $(this).children( ".submenu" ).is( ":hidden" ) ) {
                $(this).siblings('li').removeClass('active');
                $(this).addClass("active");
                $(this).siblings('.hassub').find( ".submenu" ).slideUp();
                $(this).children( ".submenu" ).slideDown();
            } else {
                $(this).removeClass("active");
                $(this).children( ".submenu" ).slideUp();
            }
            event.stopPropagation();
        });

    });


    $(window).scroll(function() {
        if ($(this).scrollTop() > 150){  
            $('.mainnav').addClass("sticky");
        }
        else{
            $('.mainnav').removeClass("sticky");
        }
    });
    </script>
    @yield('scripts')
      
    </body>
</html>