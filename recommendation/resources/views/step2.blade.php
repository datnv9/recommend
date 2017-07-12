 @extends('layouts.app2')

<!--
Author: W3layouts
Author URL: http://w3layouts.coms
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
    <title>CHƯƠNG TRÌNH GIỚI THIỆU PHIM TỰ ĐỘNG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="My Play Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap -->
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
    <!-- //bootstrap -->
    <link href="css/dashboard.css" rel="stylesheet">
    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/tippy.min.js') }}"></script>
    <!-- fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand+SC|Spectral" rel="stylesheet">
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.5.0/introjs.min.css" rel="stylesheet">-->
    <script type="text/javascript" src="js/modernizr.custom.min.js"></script>
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/tippy.css') }}" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.5.0/intro.min.js" type="text/javascript"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://andywer.github.io/jquery-dim-background/jquery.dim-background.min.js"></script>
    <!-- //fonts -->
</head>

<body>
    <!-- HAVBAR BEGIN -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                <a class="navbar-brand tippy-tt" title="Trở về trang chủ."  href="index.php">
                    <h1><img width="50" src="images/vp9.jpg" alt="" /></h1>
                </a>
            </div>
            <div class="slogan" id="slogan">
                <h4 class="slogan-title">CHƯƠNG TRÌNH GIỚI THIỆU PHIM TỰ ĐỘNG</h4>
                <h4>Bước 2: Sau đây là danh sách các phim được phần mềm giới thiệu dựa trên Bước 1.</h4>
            </div>
            <div id="navbar" class="navbar-collapse collapse">

                <!-- LOGOUT BEGIN -->
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <button class="btn btn-default dropdown-toggle tippy-btn" title="Đăng xuất." onclick="event.preventDefault();
									             document.getElementById('logout-form').submit();" type="button" id="menu1" data-toggle="dropdown"> {{ Auth::user()->name }}
  							<span class="caret"></span></button>
                        <ul class="dropdown-menu" id="logout-menu" role="menu" aria-labelledby="menu1">
                            <li>
                                <a href="{{ route('logout') }}">
									    Logout
									</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
                <!-- LOGOUT END -->
                <div class="navbar-right top-search">
                    <img src="/images/13.png" id="help" class="helper-icon">
                    <form class="navbar-form navbar-right"  action="/search" method="get">
                        <!--<a id="sampledata" class="help">Tìm kiếm phim tại đây</a>-->
                        <input type="text" class="form-control tippy-tt" title="Tìm kiếm phim tại đây, gõ vào tên phim hoặc tên thể loại." placeholder="Search..." name="key">
                        <input type="submit" value=" ">
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->
    <!-- MAIN BEGIN -->
    <div class="container-fluid main-wrapper">
        <div id="myModal" class="modal fade" role="dialog">

        </div>
        
        <div class="row">
            <!-- LEFT BEGIN -->
            <div class="main col-lg-11 col-md-9">
                <div class="item-lists">
                    @include('movies2')
                </div>

                <!--<div class="page-header">
                    <div class="row">
                        <div class="col-sm-4" data-intro="Đây là danh sách movies, Bạn hãy chọn bộ phim bạn đã xem và đánh giá" data-step="2">
                            <h3>Suggested Movies</h3>
                        </div>
                    </div>

                </div>-->

                <div class="col-sm-12 clearfix text-center">                
                    <button title="Chọn khoảng 5 bộ phim và ấn nút Result để hiển thị bảng so sánh." class="btn btn-success tippy-tt" id="btn_result" onclick="document.location.href='/result'">Result</button>
                </div>
            </div>
            
            <!-- LEFT END -->
            <div id="history" title="Đây là danh sách các phim bạn đã đánh giá." data-position="left" data-followCursor="true" class="main col-lg-1 col-md-3 tippy-tt">

            </div>
        </div>

        

    </div>
    <!-- MAIN END -->
</body>

<script type="text/javascript" src="http://andywer.github.io/jquery-dim-background/jquery.dim-background.min.js"></script>

</html>
<script language="javascript">
	var RatedFilms = [];
	var getRates = [];
    var tip1, tip2, tip, tip3, el1, el2, els, popper1, popper2, poppers =[];
    $(window).on('hashchange', function() {

        if (window.location.hash) {

            var page = window.location.hash.replace('#', '');

            if (page == Number.NaN || page <= 0) {

                return false;

            } else {

                getData(page);

            }

        }

    });
    $(document).ready(function() {
        //$('.bxslider').bxSlider();
        getHistory();
        $(document).on('click', '.pagination a', function(event) {

            $('li').removeClass('active');

            $(this).parent('li').addClass('active');

            event.preventDefault();

            var myurl = $(this).attr('href');

            var page = $(this).attr('href').split('page=')[1];

            getData(page);

        });

		initHelp();

		$('#help').hover(function(){
			showHelp();
		})
        //introJs().start();
    });

    function showHelp(){

        poppers.forEach(function(popper){
            tip.show(popper);
        });
    }

    function initHelp(){
        if (poppers.length >0) poppers = [];
        if (tip) tip.destroyAll();
        if (tip3) tip3.destroyAll();
        tip3 = tippy('.tippy-btn', {
			arraw: true,
			size: 'big',
			delay: [200,0],
            trigger: 'manual'
		})

		tip = tippy('.tippy-tt', {
			arrow: true,
			size: 'big',
			delay: [200,0],
            trigger: 'manual'
		});

		els = document.querySelectorAll('.tippy-tt');

		els.forEach(function(el){
			poppers.push(tip.getPopperElement(el));
		});
    }

    function getMovieDetail(id) {
        $.ajax({
                url: '<?=URL("/");?>/movies',
                type: 'get',
                data: {
                    id: id
                }
            })
            .done(function(data) {
                //console.log(data);
                $("#myModal").empty().html(data);
                jQuery.noConflict();
                $("#myModal").modal("show");
            })
            .fail(function(msg) {
                alert('No response from server', msg);
            });
    }

    function getHistory() {
        $.ajax({
                url: '<?=URL("/");?>/history',
                type: 'get'
            })
            .done(function(data) {
                //console.log(data);
                $('#history').empty().html(data);
				$('.RatedFilm').each(function(){
						console.log("Rated Film:" + $(this).val());
						var id = $(this).val();
						RatedFilms.push(id);
						
				});

				$('.star-loop').each(function(){
						console.log("get Rate:" + $(this).text());
						var rate = $(this).html();
						getRates.push(rate);
						
				});

				for(var index = 0; index < RatedFilms.length; index++)
				{
					// var text = `<span class="glyphicon glyphicon-star"></span>
                    //             <sp`
					// text = $('#'+RatedFilms[index]).text();
					// console.log("Text:" + text);
					$('#p'+RatedFilms[index]).empty().html('' + getRates[index]);
					$('#'+RatedFilms[index]).css('color', 'blue');
				}
                if ($('#rate_count').val() < 1) {
                    $('#btn_recommend').prop('disabled', true);
                    $('#btn_result').prop('disabled', true);
                } else {
                    $('#btn_recommend').prop('disabled', false);
                    $('#btn_result').prop('disabled', false);
                }
                initHelp();
            })
            .fail(function(msg) {
                alert('No response from server', msg);
            });
    }
    function getData(page) {

        $.ajax(

                {

                    url: '?page=' + page,

                    type: "get",

                    datatype: "html",

                })

            .done(function(data)

                {

                    $(".item-lists").empty().html(data);

                    location.hash = page;


				for(var index = 0; index < RatedFilms.length; index++)
				{
					var text = `<span class="glyphicon glyphicon-star"></span>
                                <sp`
					// text = $('#'+RatedFilms[index]).text();
					// console.log("Text:" + text);
					$('#p'+RatedFilms[index]).empty().html('' + getRates[index]);
					$('#'+RatedFilms[index]).css('color', 'blue');
				}
                initHelp();

                })

            .fail(function(jqXHR, ajaxOptions, thrownError)

                {

                    alert('No response from server');

                });

    }
</script>