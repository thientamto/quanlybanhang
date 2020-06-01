<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
	<title>Tạo Tài Khoản </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
		
    	$("div.alert").delay(3000).slideUp();
	</script>
    <!-- bootstrap-css -->
    <base href="{{asset('')}}">
	<link rel="stylesheet" href="admin_asset/css/bootstrap.min.css">
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="admin_asset/css/style.css" rel='stylesheet' type='text/css' />
	<link href="admin_asset/css/style-responsive.css" rel="stylesheet" />
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="admin_asset/css/font.css" type="text/css" />
	<link href="admin_asset/css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<script src="admin_asset/js/jquery2.0.3.min.js"></script>
</head>

<body>
	<div class="log-w3">
		<div class="w3layouts-main">
			@if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}} <br>
                @endforeach
            </div>
            @endif

            @if(Session::has('thongbao'))
			<div class="alert alert-success">
				{{Session::get('thongbao')}}
			</div>
			@endif
			<h2>Tạo Tài Khoản</h2>
			<form action="{{route('dangky')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				Tên Tổ Chức: <input type="text" class="ggg" name="tentc" placeholder="Tên tổ chức" >
				Tên Người Quản Lý: <input type="text" class="ggg" name="name" placeholder="Tên người quản lý" >
				Địa Chỉ: <input type="text" class="ggg" name="address" placeholder="Địa chỉ" >
                Số Điện Thoại: <input type="text" class="ggg" name="sdt" placeholder="Số điện thoại" >
                Password: <input type="text" class="ggg" name="password" placeholder="password" >
				Nhập lại password: <input type="password" class="ggg" name="re_password" placeholder="Nhập lại password">
				<!-- <span><input type="checkbox"> Nhớ mật khẩu</span>
				<h6><a href="#"> Quên mật khẩu? </a></h6> -->
				<!-- <div class="clearfix"></div>
				<label>name to chuc</label>
				<input type="" name="nametc">
				
				<div class="clearfix"></div>
				<label>name</label>
				<input type="" name="name" placeholder="ho va ten">

				<div class="clearfix"></div>
				<label>address</label>
				<input type="" name="address" placeholder="dia chi">

				<div class="clearfix"></div>
				<label>phone</label>
				<input type="" name="phone" placeholder="sdt"> -->

               <!--  Số Điện Thoại: <input type="text" class="ggg" name="sdt" placeholder="Số Điện Thoại" >
                Password: <input type="password" class="ggg" name="password" placeholder="Nhập password" >
				Nhập lại password: <input type="password" class="ggg" name="re_password" placeholder="Nhập lại password"> -->
				<!-- <span><input type="checkbox"> Nhớ mật khẩu</span>
				<h6><a href="#"> Quên mật khẩu? </a></h6> -->
				<!-- Tên tổ chức: <input type="text" class="ggg" name="tentc" placeholder="Nhập tên tổ chức" > -->
				Email: <input type="email" class="ggg" name="email" placeholder="Nhập email" >
				<!-- Tên người quản lý: <input type="text" class="ggg" name="name" placeholder="Nhập tên người quản lý" >
				Địa chỉ: <input type="text" class="ggg" name="address" placeholder="Nhập địa chỉ" > -->
				


				<input type="submit" value="Tạo tài khoản" name="createaccount">
			</form>
			<!-- <p>Quên tài khoản?<a href="registration.html">Tạo tài khoản</a></p> -->
		</div>
	</div>
	<script src="admin_asset/js/bootstrap.js"></script>
	<script src="admin_asset/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="admin_asset/js/scripts.js"></script>
	<script src="admin_asset/js/jquery.slimscroll.js"></script>
	<script src="admin_asset/js/jquery.nicescroll.js"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
	<script src="admin_asset/js/jquery.scrollTo.js"></script>
</body>

</html>