<style>
	.single-right-grids {
		display: table;
	}
	#img-main {
		width: 70%;
		height: auto;
	}
	.mov-img {
		width: 72px;
		height: auto;
	}
</style>

<div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title"><?= html_entity_decode($movie->MovieName) ?></h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid main">
				<div class="col-sm-12">
					<div class="page-header">
						<h2></h2>
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
										<p><a id="5" class="rate play-icon popup-with-zoom-anim">5. Great</a></p>
									</div>
									<div class="help-button-bottom">
										<p><a id="4" class="rate play-icon popup-with-zoom-anim">4. Very Good</a></p>
									</div>
									<div class="help-button-bottom">
										<p><a id="3" class="rate play-icon popup-with-zoom-anim">3. What ever</a></p>
									</div>
									<div class="help-button-bottom">
										<p><a id="2"  class="rate play-icon popup-with-zoom-anim">2. Not good</a></p>
									</div>
									<div class="help-button-bottom">
										<p><a id="1" class="rate play-icon popup-with-zoom-anim">1. Bad</a></p>
									</div>
								</div>
								<!-- END RATING -->
							</div>
						</div>
					</div>
				</div>
					</div>
					<form method="POST" id="frecommend" action="/recommend">
							{{ csrf_field() }}	
							<input type="hidden" id="irecommend" name="irecommend" value=""/>
					</form>
				
			<div class="clearfix"> </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Not sure</button>
		</div>
	</div>
</div>
<script>
		var url = '<?=URL("/");?>';
		//alert('hi');
		var user = {{Auth::Id()}};
		console.log('auth::id', user);
		var id_movielens = <?= $movie->MovieLensId ?>;
		var option = <?= $option ?>;
		console.log('option:',option);
		console.log('movie_id:',id_movielens);
		$('.rate').click(function(){
			var rate = $(this).attr("id");
			$.ajax({
				method: "POST",
				url: '<?=URL("/");?>/rate',
				data: { id: <?=$movie->id?>, rate: rate,_token: "<?=csrf_token();?>" }
			})
			.done(function( msg ) {
				console.log('message:',msg);
				if (msg != 'fail' && option == 1) {
						$.ajax({
								url:'http://10.12.11.161:8002/events.json?accessKey=VMdgKP6ujmoo4Ixp4htuVR_qK0_fJPnG986luvsfvvxfcJFQyLv9PMVQalzZML9n',
								type: 'POST',
								dataType: 'json',
								contentType: 'application/json',
								processData : false,
								data : '{ "event" : "rate", "entityType" : "user", "entityId" : "'+user+'", "targetEntityType" : "item", "targetEntityId" : "'+id_movielens+'", "properties" : { "rating" : '+rate+'}}',
								success: function(data){
										console.log(JSON.stringify(data));		
								},
								error: function(){
										alert("Cannot send data");		
								}	
						});
				}
				//alert( "Rating " + msg );
				if (option == 1) {
						var blacklist = JSON.parse($('#blacklist').val());
						console.log(typeof(blacklist));
						getDynamic(blacklist);
						getHistory();
						jQuery.noConflict();
						$("#myModal").modal("hide");
						
				}
				else {
					var blacklist = JSON.parse($('#blacklist').val());
					console.log(typeof(blacklist));
					getDynamic(blacklist);
					getHistory();
					jQuery.noConflict();
					$("#myModal").modal("hide");
					
				}
			});
		});
</script>
