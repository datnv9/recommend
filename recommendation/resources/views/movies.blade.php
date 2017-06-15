@extends('help')

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
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
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
          </button><img id="help1" src="images/13.png">
            <a class="navbar-brand" href="index.php"><h1><img width="50" src="images/vp9.jpg" alt="" /></h1></a>
        </div>
        <div class="slogan" id="slogan">
        	<h2 class="slogan-title">CHƯƠNG TRÌNH GIỚI THIỆU PHIM TỰ ĐỘNG</h2>
        	<div>Hãy đánh giá các phim bạn đã xem bên dưới (càng nhiều càng tốt)</div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            
			<div class="header-top-right top-search">
                                
				<form class="navbar-form navbar-right" action="/search" method="post">
                                        {{ csrf_field() }}
                                        <a id="sampledata" class="help">Tìm kiếm phim tại đây</a>
                                        <input type="text" style="z-index:0" class="form-control" placeholder="Search..." name="key">
                                        <input type="submit" value=" ">
                                        
				</form><button id="help">help</button>
			</div>
            
        </div>
        
        <div class="clearfix"> </div>
      </div>
    </nav>
	
        

<div class="container-fluid main">
	<div class="col-sm-11">
        	<?php if ($page <=0) { ?>
			<a href="javascript:;" class="page-nav page-prev disabled"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<?php } else { ?>
			<a href="index.php?page=<?= $page-1 ?>" class="page-nav page-prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<?php } ?>
			<?php if ($next) { ?>
			<a href="index.php?page=<?= $page+1 ?>" class="page-nav page-next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			<?php } else { ?>
			<a href="javascript:;" class="page-nav page-next disabled"><span class="glyphicon glyphicon-chevron-next"></span></a>
			<?php } ?>
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
                                                <a id="sampledata2" class="help2">Đây là danh sách videos, Bạn hãy chọn bộ phim bạn đã xem và đánh giá </a>
						<h3>All Videos</h3>
                                                <center>
                                                <div class="pagination"> {{ $item->links() }} </div>
                                                <form method="POST" id="frecommend" action="/recommend">
                                                    {{ csrf_field() }}	
                                                    <input type="hidden" id="irecommend" name="irecommend" value=""/>
                                                </form>
                                                <a id="sampledata1" class="help1">Sau khi chọn khoảng 5 phim hãy click vào nút Recommend để nhận gợi ý</a>
                                                <button id="btn_recommend"> Recommend</button>
                                                </center>
                                        </div>
                                        <?php foreach ($item as $i=>$value):?>
                                        	<?php if ($i%6 == 0) { ?><div class="clearfix"></div><?php } ?>
                                            <div class="col-sm-2 resent-grid recommended-grid slider-top-grids">
                                                    <div class="resent-grid-img recommended-grid-img bxslider">
                                                            <a href="/movies/<?=$value->id;?>"><img src="https://image.tmdb.org/t/p/w500/<?php echo $value->Image;?>" alt="" /></a>
                                                            <div class="time">
                                                                    <p>3:04</p>
                                                            </div>
                                                            <div class="clck">
                                                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                                            </div>
                                                    </div>
                                                    <div class="resent-grid-info recommended-grid-info" >
                                                            <h3>
                                                                <a href="/movies/<?=$value->id;?>" class="title title-info"><?php echo $value->MovieName;?></a><br>
                                                            </h3>
                                                            <span><?php echo $value->getCategory($value->id);?></span>
                                                    </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <div class="clearfix"> </div>

				</div>
                                                      <div class="clearfix"> </div><br>

			</div>
	</div>
  	<div class="col-sm-1">
                               <a id="sampledata3" class="help3">Đây là danh sách các phim bạn đã đánh giá </a>

  		<?php foreach ($rate as $mov) { ?>
        <div class="single-right-grids">
                <div class="single-right-grid-left">
                    <a href="/movies/<?= $mov->id;?>">
                        <img class="media-object mov-img" src="https://image.tmdb.org/t/p/w500/<?= $mov->Image;?>">
                    </a>
		<small>	<?=$mov->getRate($mov->id);?> </small>
                </div>
        </div>
        <?php } ?>
  		

  		
  	</div>
  		
</div>
</body>
</html>

<script laguage="javascript">
$(document).ready(function(){
  //$('.bxslider').bxSlider();
  console.log({{Auth::id()}});
  user = {{Auth::id()}};
  $('#btn_recommend').click(function(){
		//alert('click');
		$.ajax({
			url:'http://localhost:8002/queries.json',
			type: 'POST',
			dataType: 'json',
			contentType: 'application/json',
			processData : false,
			data : '{ "user":"'+user+'", "num": 500 }',
			success: function(data){
                                $('#irecommend').val(JSON.stringify(data));
				console.log("Data:",JSON.stringify(data));
                                $('#frecommend').submit();		
			},
			error: function(err){
				alert("Error: Cannot get data",err);		
			}	
		});
	})
});
</script>

