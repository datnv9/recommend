 @extends('layouts.app2')

<head>
<title>CHƯƠNG TRÌNH GIỚI THIỆU PHIM TỰ ĐỘNG</title>
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
	<!-- //bootstrap -->
	<link href="css/dashboard.css" rel="stylesheet">
	<!-- Custom Theme files -->
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- fonts -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
	    rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
	<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Patrick+Hand+SC|Spectral" rel="stylesheet">
	<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.5.0/introjs.min.css" rel="stylesheet">-->
	<script type="text/javascript" src="js/modernizr.custom.min.js"></script>
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.5.0/intro.min.js" type="text/javascript"></script>-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- //fonts -->
</head>

<style>
.spinner {
  width: 100px;
}
.spinner input {
  text-align: right;
}
.input-group-btn-vertical {
  position: relative;
  white-space: nowrap;
  width: 1%;
  vertical-align: middle;
  display: table-cell;
}
.input-group-btn-vertical > .btn {
  display: block;
  float: none;
  width: 100%;
  max-width: 100%;
  padding: 8px;
  margin-left: -1px;
  position: relative;
  border-radius: 0;
}
.input-group-btn-vertical > .btn:first-child {
  border-top-right-radius: 4px;
}
.input-group-btn-vertical > .btn:last-child {
  margin-top: -2px;
  border-bottom-right-radius: 4px;
}
.input-group-btn-vertical i{
  position: absolute;
  top: 0;
  left: 4px;
}
</style>

<body>
    <center><h1>KHÔNG THỂ DỰ ĐOÁN!</h1> <h1>Độ lệch chuẩn RMSE = {{$average_wrong}} </h1></center>

    <form id="form-setting" class="form-horizontal" role="form" method="GET" action="/setting">
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <h4><label for="setting" class="col-sm-7 control-label">Độ lệch chuẩn có thể chấp nhận: </label></h4>
            <div class="input-group spinner">
                <input name="setting" type="text" class="form-control" value="{{$rmse_setting}}">
                <div class="input-group-btn-vertical">
                <button class="btn btn-default" type="button"><i class="fa fa-caret-up"></i></button>
                <button class="btn btn-default" type="button"><i class="fa fa-caret-down"></i></button>
                </div>
            </div>
        </div>

        <center><button type='submit' class='btn btn-default'>OK</button></center>
    </form>
</body>
<script>
(function ($) {
  $('.spinner .btn:first-of-type').on('click', function() {
    $('.spinner input').val( (parseFloat($('.spinner input').val()) + 0.1).toFixed(2));
  });
  $('.spinner .btn:last-of-type').on('click', function() {
    $('.spinner input').val( (parseFloat($('.spinner input').val()) - 0.1).toFixed(2));
  });
})(jQuery);
</script>