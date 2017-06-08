@extends('layouts.app')
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
$url = URL('/');
//echo $url; die;
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $movie->MovieName;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Play Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="<?=$url;?>/css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="<?=$url;?>/css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="<?=$url;?>/css/style.css" rel='stylesheet' type='text/css' media="all" />

<script src="<?=$url;?>/js/jquery-1.11.1.min.js"></script>
<script src="<?=$url;?>js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        //alert('hi');
        $('.rate').click(function(){
            var rate = $(this).attr("id");
            $.ajax({
                method: "POST",
                url: "<?=$url;?>/rate",
                data: { id: <?=$movie->id?>, rate: rate,_token: "<?=csrf_token();?>" }
              })
                .done(function( msg ) {
                  alert( "Rating " + msg );
                });
            });
        });
</script>
<!--start-smoth-scrolling-->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?=$url;?>/js/modernizr.custom.min.js"></script>    
<link href="<?=$url;?>/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<script src="<?=$url;?>/js/jquery.magnific-popup.js" type="text/javascript"></script>
<!-- //fonts -->
<style>
	.single-right-grids {
		display: table;
	}
	#img-main {
		width: 100%;
		height: auto;
	}
	.mov-img {
		width: 72px;
		height: auto;
	}
</style>
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
            <a class="navbar-brand" href="<?=$url;?>/index.php"><h1><img width="50" src="<?=$url;?>/images/vp9.jpg" alt="" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right" action="/search" method="post">
                                        {{ csrf_field() }}	
                                        <input type="text" class="form-control" placeholder="Search..." name="key">
					<input type="submit" value=" ">
				</form>
			</div>  
			<div class="header-top-right">
				<div class="clearfix"> </div>
			</div>
        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
		<!-- MAIN SECTION -->
		<div class="container-fluid main">
			<div class="col-sm-9">
				<div class="page-header">
					<h2><?= html_entity_decode($movie->MovieName) ?></h2>
				</div>
				<div class="clearfix">
					<div class="row">
						<div class="col-sm-8">
							<img id="img-main" class="img-responsive" src="https://image.tmdb.org/t/p/w500/<?php echo $movie->Image;?>"/>
						</div>
						<div class="col-sm-4">
							<!-- BEGIN RATING -->
							<h3>Rate this</h3> 
                            <div class="help-grids">
                                    <div class="help-button-bottom">
                                            <p><a id="5" href="#" class="rate play-icon popup-with-zoom-anim">5. Great</a></p>
                                    </div>
                                    <div class="help-button-bottom">
                                            <p><a id="4" href="#" class="rate play-icon popup-with-zoom-anim">4. Very Good</a></p>
                                    </div>
                                    <div class="help-button-bottom">
                                            <p><a id="3" href="#" class="rate play-icon popup-with-zoom-anim">3. What ever</a></p>
                                    </div>
                                    <div class="help-button-bottom">
                                            <p><a id="2" href="#" class="rate play-icon popup-with-zoom-anim">2. Not good</a></p>
                                    </div>
                                    <div class="help-button-bottom">
                                            <p><a id="1" href="#" class="rate play-icon popup-with-zoom-anim">1. Bad</a></p>
                                    </div>
                                    <div class="help-button-bottom">
                                            <p><a id="0" href="#" class="rate play-icon popup-with-zoom-anim">Not sure</a></p>
                                    </div>
                            </div>
							<!-- END RATING -->
						</div>
					</div>
				</div>
				
				<div class="published">
						<div class="load_more">	
							<ul id="myList">
								<li>
									<h4>Published on 15 June 2015</h4>
									<p>Nullam fringilla sagittis tortor ut rhoncus. Nam vel ultricies erat, vel sodales leo. Maecenas pellentesque, est suscipit laoreet tincidunt, ipsum tortor vestibulum leo, ac dignissim diam velit id tellus. Morbi luctus velit quis semper egestas. Nam condimentum sem eget ex iaculis bibendum. Nam tortor felis, commodo faucibus sollicitudin ac, luctus a turpis. Donec congue pretium nisl, sed fringilla tellus tempus in.</p>
								</li>
								<li>
									<p>Nullam fringilla sagittis tortor ut rhoncus. Nam vel ultricies erat, vel sodales leo. Maecenas pellentesque, est suscipit laoreet tincidunt, ipsum tortor vestibulum leo, ac dignissim diam velit id tellus. Morbi luctus velit quis semper egestas. Nam condimentum sem eget ex iaculis bibendum. Nam tortor felis, commodo faucibus sollicitudin ac, luctus a turpis. Donec congue pretium nisl, sed fringilla tellus tempus in.</p>
									<p>Nullam fringilla sagittis tortor ut rhoncus. Nam vel ultricies erat, vel sodales leo. Maecenas pellentesque, est suscipit laoreet tincidunt, ipsum tortor vestibulum leo, ac dignissim diam velit id tellus. Morbi luctus velit quis semper egestas. Nam condimentum sem eget ex iaculis bibendum. Nam tortor felis, commodo faucibus sollicitudin ac, luctus a turpis. Donec congue pretium nisl, sed fringilla tellus tempus in.</p>
									<div class="load-grids">
										<div class="load-grid">
											<p>Category</p>
										</div>
										<div class="load-grid">
											<a href="movies.html">Entertainment</a>
										</div>
										<div class="clearfix"> </div>
									</div>
								</li>
							</ul>
						</div>
				</div>
			</div>
			<div class="col-sm-3 single-right">
                             
			<h3>Rate History</h3>
                        <div class="single-grid-right">
			<?php if ($history) { ?>
                            <?php foreach ($history as $mov) { ?>
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
			<?php } ?>
                        </div>
		</div>
                </div>
		</div>
            
		<div class="clearfix"> </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>
