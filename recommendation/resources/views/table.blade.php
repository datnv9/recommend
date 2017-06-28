@extends('layouts.app')

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
<script src="/js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Spectral" rel="stylesheet">
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
			<div class="header-top-right top-search">
				<form class="navbar-form navbar-right" action="/search" method="post">
                                        {{ csrf_field() }}	
                                        <input type="text" class="form-control" placeholder="Search..." name="key">
					<input type="submit" value=" " id="searchicon">
				</form>
			</div>
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
						<td><?=$item->getRate($item->id,2);?></td>
						<td style="font-family: arial"><?=$item->AverageRating; ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- TABLE END -->
	</div>
  	<!--<div class="col-sm-3">
  		<?php foreach ($rate as $mov) { ?>
        <div class="single-right-grids">
                <div class="col-md-4 single-right-grid-left">
                    <a href="/movies/<?= $mov->id;?>">
                        <img class="media-object mov-img" src="https://image.tmdb.org/t/p/w500/<?= $mov->Image;?>">
                    </a>
                </div>
                <div class="col-md-8 single-right-grid-right">
                        <a href="/movies/<?= $mov->id;?>">
                        <h4 class="media-title"><?= $mov->MovieName ?></h4>
                        </a>
                </div>
        </div>
        <?php } ?>
  		
  		
  		
  		
  		
  	</div>-->
  		
</div>
</body>
</html>
<script language="javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider();
});
</script>