@extends('layouts.app2')

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Recommend System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Play Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<!-- //fonts -->
</head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index.php"><h1><img width="50" src="images/vp9.jpg" alt="" /></h1></a>
        </div>

        <div class="slogan" id="slogan">
        	<h2 class="slogan-title">CHƯƠNG TRÌNH GIỚI THIỆU PHIM TỰ ĐỘNG</h2>
          <h4> Kết quả đánh giá </h4>
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
               
            </div>
        
        <div class="clearfix"> </div>
      </div>
    </nav>
	
        

<div class="container-fluid main">
	<div class="col-sm-9">

		<!-- TABLE BEGIN -->
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>Video</th>
						<th>Đánh giá</th>
						<th>Dự đoán</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($movie as $item) { ?>
					<tr>
						<td><?=$item->MovieName;?></td>
						<td><?=$item->getRate($item->id,2,$uid);?></td>
						<td style="font-family: arial"><?=$item->AverageRating; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
    <div class"result">
      <h3>Độ lệch trung bình: {{$rmse}}</h3>
    </div>
		<!-- TABLE END -->
	</div>
  
  		
</div>
</body>
</html>
<script language="javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider();
});
</script>