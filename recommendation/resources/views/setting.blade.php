 @extends('layouts.app2')

<head>
<title>CHƯƠNG TRÌNH GIỚI THIỆU PHIM TỰ ĐỘNG</title>
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
	<!-- //bootstrap -->
	<link href="css/dashboard.css" rel="stylesheet">
	<!-- Custom Theme files -->
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
	<script src="js/jquery.min.js"></script>
	<!-- fonts -->
	<!--<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
	    rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
	<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Patrick+Hand+SC|Spectral" rel="stylesheet">-->
	<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.5.0/introjs.min.css" rel="stylesheet">-->
	<script type="text/javascript" src="js/modernizr.custom.min.js"></script>
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.5.0/intro.min.js" type="text/javascript"></script>-->
	<script src="js/bootstrap.min.js"></script>
	<!-- //fonts -->
</head>

<style>
*{
  font-family: 'Open Sans', sans-serif
}
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
    <center>
      <!--<h1>CẢNH BÁO!</h1> <h1>Độ lệch chuẩn RMSE = {{$average_wrong}} </h1>
      <h4>Do dữ liệu training của bạn có độ lệch so với dữ liệu tiêu chuẩn lớn hơn <strong>1.0</strong></h4>
      <h4>Kết quả dự đoán có thể sẽ không chính xác</h4> 
      <a href='setting?setting=4' class='btn btn-default'>OK</a>-->
      <h3>Dữ liệu của bạn chưa đủ để hệ thống phán đoán với độ tin cậy cao.</h3>
      <h3>Bạn có thể quay lại đánh giá thêm hoặc đi tiếp.</h3>
      <a href='/' class='btn btn-default'>Quay lại</a> <a href='setting?setting=4' class='btn btn-default'>Đi tiếp</a>
    </center>
</body>
