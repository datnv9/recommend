<h5>History ({{$rate->count()}})</h5>
<input id="rate_count" type="hidden" name="rate_count" value="{{$rate->count()}}"></input>
<a class='btn btn-sm btn-danger' href='/deleteallhistory/1'>Clear History</a>
<br>
<br>
<div data-intro="Đây là danh sách các phim bạn đã đánh giá" data-position="left" data-step="3">
    <?php foreach ($rate as $mov) { ?>
    <div class="single-right-grids">
        <div class="single-right-grid-left">
            <a onclick="getMovieDetail(<?=$mov->id;?>)">
                <img class="media-object mov-img" src="https://image.tmdb.org/t/p/w500/<?= $mov->Image;?>">
            </a>
            <small class="stars">	<?=$mov->getRate($mov->id);?> </small>
        </div>
    </div>
    <?php } ?>
</div>