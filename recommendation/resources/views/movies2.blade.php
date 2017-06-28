<div class="page-header">
	<div class="row">
		<div class="col-sm-4" data-intro="Đây là danh sách movies, Bạn hãy chọn bộ phim bạn đã xem và đánh giá" data-step="2">
			<h3>All Movies</h3>
		</div>
		<div class="col-sm-3 clearfix text-center">                
							<button data-step="3" data-intro="Click vào nút này để hiển thị kết quả dự đoán" class="btn btn-success" id="btn_result" onclick="document.location.href='/result'">Result</button>
		</div>
		<div class="col-sm-5 text-right">
			<ul class="pagination">{{ $item->links() }}</ul>
		</div>
	</div>
	
</div>		
<div class="main-grids">
	<div class="clearfix top-grids"  >
			<?php foreach ($item as $i => $value) :?>
				<div class="resent-grid slider-top-grids" style="height: 33vh;">
					<div class="resent-grid-img bxslider">
						<a  onclick="getMovieDetail(<?=$value->id;?>)"><img src="https://image.tmdb.org/t/p/w500/<?php echo $value->Image;?>" alt="" /></a>
					</div>
					<div class="resent-grid-info">
						<h4><a id="<?=$value->id;?>" onclick="getMovieDetail(<?=$value->id;?>)" class="title title-info"><?php echo sprintf("%04d", $value->id).". ".$value->MovieName;?><p id="p<?=$value->id;?>"></p></a><br></h4>
						<p class="author"><?php echo $value->getCategory($value->id);?></p>
					</div>
				</div>
			<?php endforeach; ?>
	</div>
</div>