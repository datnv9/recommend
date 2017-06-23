<?php foreach ($item as $value) :?>
	<div class="resent-grid slider-top-grids" style="height: 33vh;">
		<div class="resent-grid-img bxslider">
			<a onclick="getMovieDetail(<?=$value->id;?>)"><img src="https://image.tmdb.org/t/p/w500/<?php echo $value->Image;?>" alt="" /></a>
		</div>
		<div class="resent-grid-info">
			<h4><a onclick="getMovieDetail(<?=$value->id;?>)" class="title title-info"><?php echo $value->id.". ".$value->MovieName;?></a><br></h4>
			<p class="author"><?php echo $value->getCategory($value->id);?></p>
		</div>
	</div>
<?php endforeach; ?>
<input type="hidden" id="blacklist" name="blacklist" value="{{$blacklist}}">

<script>
</script>