<!DOCTYPE html>

<head>
	<title>Bán Hàng</title>
	<meta content="text/html; charset=utf-8" />

	<base href="{{asset('')}}">
	<!-- <link href="admin_asset/css/stylebh.css" rel='stylesheet' type='text/css' /> -->
	<link href="admin_asset/css/stylebh.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<section id="main-content" class="main-content">
		<section class="container">
			<div class="header-left">
				<form>
					<input type="text" name="search" placeholder="Tìm mặt hàng..">
				</form>
			</div>

			<div class="header">
			</div>

			<div class="header-right">
				<li class="user-name" title="0776541952" style="list-style: none">
					<span>0776541952</span>
				</li>
			</div>
		</section>

		<section class="content">
			<div class="content-left">
				<form>
					<div class="row">
						<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Ten san pham</th>
						      <th scope="col">Gia</th>
						      <th scope="col">So luong</th>
						      <th scope="col">Thao tac</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@if($cart)
						  	<?php $sum = 0; ?>
						  	@foreach($cart as $value)
						  	<?php $sum += $value['giaban'] * $value['soluong'] ?>
						    <tr>
						      <th scope="row">{{ $i++ }}</th>
						      <td>{{ $value['tensanpham'] }}</td>
						      <td>{{ number_format($value['giaban']) }} VND</td>
						      <td>
						      	<input  style="width: 50px" type="number" min="1" name="qty" class="qty" value="{{ $value['soluong'] }}">
						      	<input  style="width: 50px" type="hidden" min="1" name="id" class="id" value="{{ $value['id'] }}">
						      </td>
						      <td>
						      	<a class="btn btn-danger delete">Xoa</a>
						      	<a class="btn btn-info edit">Sua</a>
						      </td>
						    </tr>
						    @endforeach
						    @endif
						    <tr>
						    	<td colspan="4"></td>
						    	<td>
						    		<a href="{{ route('xoa-gio-hang') }}" class="btn btn-primary">Xóa hết</a>
						    	</td>
						    </tr>
						  </tbody>
						</table>
					</div>
				</form>

				@if(Session::has('thongbao'))
					<div class="alert alert-success">
						{{ Session::get('thongbao') }}
					</div>
				@endif
				<div class="row">
					@foreach($sanpham as $value)
					<div class="col-sm-4">
						<div class="card mt-3">
						  <img class="card-img-top" src="{{ $value['hinh'] }}" alt="Card image cap" height="120px">
						  <div class="card-body">
						    <h5 class="card-title">{{ $value['tensp'] }}</h5>
						    <p class="card-text">{{ number_format($value['giaban']) }} VND</p>
						    <a href="{{ route('them-gio-hang', $value['idsp']) }}" class="btn btn-primary">Thêm giỏ hàng</a>
						  </div>
						</div>
					</div>
					@endforeach
				</div>

			</div>
			<div class="content-right">
				<form method="post" action="{{ route('luu-gio-hang') }}">
					{{ csrf_field() }}
					<label for="">Nhân viên:</label>
					<select name="nhanvien" class="form-control">
						@foreach($nhanvien as $value)
						<option value="{{ $value['idnv'] }}">{{ $value['tennv'] }}</option>
						@endforeach
					</select>
					<p id="hvn" style="float: right;"></p>
					<script>
						var today = new Date();
						var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
						var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
						var dateTime = date+' '+time;
						document.getElementById("hvn").innerHTML = dateTime;
					</script>
					<br>
					<label>Chọn khách hàng:</label>
					<select name="khachhang" class="form-control">
						@foreach($khachhang as $value)
						<option value="{{ $value['idkh'] }}">{{ $value['tenkh'] }}</option>
						@endforeach
					</select>
					<br>
					<!-- <input type="text"  placeholder="Tìm khách hàng.."> -->

					<div></div>
					<h4 class="text-center">Thong tin Hoa Don</h4>
					<p id="thongbao"></p>
					@if($cart)
					<ul>Tổng tiền: {{ number_format($sum) }} VND</ul>
					<input type="hidden" name="tongtien" value="{{ $sum }}" id="price">
					@else
					<ul>Tổng tiền: 0</ul>
					@endif
					<ul>Giảm giá: 
						<input type="number" class="form-control" value="0" placeholder="tien giam" name="giamgia" id="giamgia">
					</ul>
					
					<ul>Khách cần trả:  <p id="khachcantra"></p></ul>

					<ul>Khách thanh toán: 
						<input type="number" class="form-control" placeholder="so tien khach dua" id="khachdua" name="khachtra">
					</ul>

					<ul>Tiền thừa trả khách: <p id="tienthua"></p></ul>
					<ul>
						<input type="radio" name="tinhtrang" value="Đã xuất" checked="">Đã xuất
						<input type="radio" name="tinhtrang" class="ml-3" value="Chưa xuất">Chưa xuất
					</ul>
					<div  class="btn btn-info mt-2 mb-3 form-control"  id="tinhtien">Tinh Hóa Đơn</div>

					<textarea name="ghichu" rows="5" class="form-control" style="resize: none;" placeholder="nhap ghi chu"></textarea>
					<button type="submit" class="btn btn-success mt-2 form-control">Thanh toán</button>
				</form>
			</div>
		</section>
	</section>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".edit").click(function(){
			var id = $(this).parent().parent().find(".id").val();
			var qty = $(this).parent().parent().find(".qty").val();
			
			$.ajax({
				url: '{{ route('sua-mot-san-pham-gio-hang') }}',
				type: 'get',
				cache: false,
				data: {"id":id, "qty":qty},
				success: function(data){
					if(data = "ok")
					{
						alert("cập nhật thành công");
						location.reload();
					}
				}
			});
		})

		$(".delete").click(function(){
			var id = $(this).parent().parent().find(".id").val();
			$.ajax({
				url: '{{ route('xoa-mot-san-pham-gio-hang') }}',
				type: 'get',
				cache: false,
				data: {"id":id},
				success: function(data){
					if(data = "ok")
					{
						alert("xóa thành công");
						location.reload();
					}
				}
			});
		})


		$("#tinhtien").click(function(){
			var price = $(this).parent().parent().find("#price").val();
			var giamgia = $(this).parent().parent().find("#giamgia").val();
			var khachdua = $(this).parent().parent().find("#khachdua").val();


			if(giamgia == '0')
			{
				var tientra = price - giamgia;
				if(khachdua < tientra)
				{
					$('#thongbao').html('<p style="color: red">so tien khach dưa khong hơp lê</p>');
				}
				else
				{
					$('#thongbao').html('<p style="color: blue">so tien khach dưa hơp lê</p>');
					var tienthua = khachdua - tientra;
					$('#khachcantra').text(tientra);
					$('#tienthua').text(tienthua);
				}
			}
			else
			{
				var tientra = price - giamgia;
				if(khachdua < tientra)
				{
					$('#thongbao').html('<p style="color: red">so tien khach dưa khong hơp lê</p>');
				}
				else
				{
					$('#thongbao').html('<p style="color: blue">so tien khach dưa hơp lê</p>');
					var tienthua = khachdua - tientra;
					$('#khachcantra').text(tientra);
					$('#tienthua').text(tienthua);
				}
			}

			// console.log(price+"_"+giamgia+"_"+khachdua);
		})
	})
</script>
</html>
