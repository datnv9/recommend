<div class="clearfix"></div>
<!--<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">HTML</a></li>
    <li><a href="#">CSS</a></li>
    <li><a href="#">JavaScript</a></li>
  </ul>
</div>-->
<div class="clearfix col-sm-4" data-intro="Đây là danh sách movies, Bạn hãy chọn bộ phim bạn đã xem và đánh giá" data-step="2">
	<h3>Suggested Movies</h3>
</div>
<div class="clearfix"></div>
<?php foreach ($item as $value) :?>
	<div class="resent-grid slider-top-grids" style="height: 33vh;">
		<div class="resent-grid-img bxslider">
			<a onclick="getMovieDetail(<?=$value->id;?>,2)"><img src="https://image.tmdb.org/t/p/w500/<?php echo $value->Image;?>" alt="" /></a>
		</div>
		<div class="resent-grid-info">
			<h4><a onclick="getMovieDetail(<?=$value->id;?>)" class="title title-info"><?php echo sprintf("%04d", $value->id).". ".$value->MovieName;?></a><br></h4>
			<p class="author"><?php echo $value->getCategory($value->id);?></p>
		</div>
	</div>
<?php endforeach; ?>
<input type="hidden" id="blacklist" name="blacklist" value="{{$blacklist}}">

<script>
	
</script>