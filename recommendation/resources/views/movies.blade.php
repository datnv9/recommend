<div class="page-header">
	<div class="row">
		<div class="col-sm-4" data-intro="Đây là danh sách movies, Bạn hãy chọn bộ phim bạn đã xem và đánh giá" data-step="2">
			<h3>All Movies</h3>
		</div>
		<div class="col-sm-3 clearfix text-center">
			<form method="POST" id="frecommend" action="/recommend">
				{{ csrf_field() }}	
				<input type="hidden" id="irecommend" name="irecommend" value=""/>
			</form>
		
			<button target="_blank" data-intro="Sau khi chọn khoảng 5 phim hãy click vào nút Recommend để nhận gợi ý" data-step="4" title="Sau khi chọn khoảng 5 phim hãy click vào nút Recommend để nhận gợi ý" class="btn btn-success has-tooltip" id="btn_recommend"> Recommend</button>
		
		
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
						<a href="/movies/<?=$value->id;?>"><img src="https://image.tmdb.org/t/p/w500/<?php echo $value->Image;?>" alt="" /></a>
					</div>
					<div class="resent-grid-info">
						<h4><a href="/movies/<?=$value->id;?>" class="title title-info"><?php echo $value->id.". ".$value->MovieName;?></a><br></h4>
						<p class="author"><?php echo $value->getCategory($value->id);?></p>
					</div>
				</div>
			<?php endforeach; ?>
	</div>
</div>