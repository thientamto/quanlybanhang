@extends('admin.layout.index')

@section('content')

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="form-w3layouts">
			<!-- page start-->
			<div class="row">
				<div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							Chi Tiết Nhập
						</header>
						@if(session('thongbao'))
						<div class="alert alert-success">
							{{session('thongbao')}}
						</div>
						@endif
						<form action="{{ route('post-nhap-kho') }}" method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<label>Loại sản phẩm</label>
								<select class="form-control" name="loaisp">
									<option>-----Chọn-----</option>
									@foreach($loaisp as $value)
									<option value="{{ $value['idnsp'] }}">{{ $value['tennsp'] }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Tên sản phẩm</label>
								<input class="form-control" type="text" name="tensp" placeholder="Nhập địa chỉ tổ chức">
							</div>
							<div class="form-group">
								<label>Đơn vị tính</label>
								<select class="form-control" name="dvt">
									<option>-----Chọn-----</option>
									@foreach($donvitinh as $value)
									<option value="{{ $value['iddvt'] }}">{{ $value['tendvt'] }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Giá nhập</label>
								<input class="form-control" type="number" name="gianhap" placeholder="Nhập địa chỉ tổ chức">
							</div>

							<div class="form-group">
								<label>Giá bán</label>
								<input class="form-control" type="number" name="giaban" placeholder="Nhập địa chỉ tổ chức">
							</div>
							<div class="form-group">
								<label>Số lượng</label>
								<input class="form-control" type="number" name="soluongton" placeholder="Nhập địa chỉ tổ chức">
							</div>
							<div class="form-group">
								<input class="btn btn-success form-control" type="submit" value="Lưu chi tiết phiếu">
							</div>
						</form>
					</section>

					<section class="panel">
						<header class="panel-heading">
							Phiếu Tạm
						</header>
						<table class="table table-dark">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Tên sản phẩm</th>
									<th scope="col">Giá nhập</th>
									<th scope="col">Giá bán</th>
									<th scope="col">Số lượng</th>
								</tr>
							</thead>
							<tbody>
								@if($data_list)
								<?php $i = 1; $sotiennhap=0;?>
								@foreach($data_list as $value)
								<?php $sotiennhap += $value['gianhap'] * $value['soluong'] ?>
								<tr>
									<th scope="row">{{ $i++ }}</th>
									<td>{{ $value['tensanpham'] }}</td>
									<td>{{ number_format($value['gianhap']) }} Vnd</td>
									<td>{{ number_format($value['giaban']) }} Vnd</td>
									<td>
										<input style="width: 70px" type="number" min="1" class="qty" value="{{ $value['soluong'] }}">
										<input style="width: 70px" type="hidden" class="id" value="{{ $value['id'] }}">
									</td>
									<td>
										<a class="btn btn-info click">Sửa</a>
										<a href="{{ route('xoa-one-cart-nhap-kho', $value['id'])}}" class="btn btn-danger">Xóa</a>
									</td>
								</tr>
								@endforeach
								<tr>
									<td colspan="5"></td>
									<td>
										<a href="{{ route('xoa-all-cart-nhap-kho') }}" class="btn btn-primary">Xóa tất cả</a>
									</td>
								</tr>
								@else
								<tr><td>chua co</td></tr>
								@endif
							</tbody>
						</table>
						<section class="panel">
							<header class="panel-heading">
								PHIẾU NHẬP
							</header>
							@if(session('thongbao'))
							<div class="alert alert-success">
								{{session('thongbao')}}
							</div>
							@endif
							<form action="{{ route('luu-phieu-nhap-kho') }}" method="post">
								{{ csrf_field() }}
								<div class="form-group">
									<label>Tên tổ chức</label>
									<input type="hidden" name="idtc" value="{{$tochuc->idtc}}">
									<input type="text" disabled="" class="form-control" value="{{$tochuc->tentc }}">
								</div>

								<div class="form-group">
									<label>Tên tổ chức</label>
									<div class="radio">
									  <label><input type="radio" name="tinhtrang" checked value="Đã xuất">Đã xuất</label>
									</div>
									<div class="radio">
									  <label><input type="radio" name="tinhtrang" value="Chưa xuất">Chưa xuất</label>
									</div>
								</div>

								<div class="form-group">
									<label>Số tiền nhập </label>
									@if($data_list)
									<input class="form-control" name="tonggia" value="{{ $sotiennhap }}" />
									@else
									<input class="form-control" value="chua co" disabled="" />
									@endif
								</div>
								
								<div class="form-group">
									<label>Nhà cung cấp</label>
									<select class="form-control" name="idncc">
										<option>-----Chọn-----</option>
										@foreach($nhacungcap as $value)
										<option value="{{ $value['idncc'] }}">{{ $value['tenncc'] }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group">
									<label>Số tiền giảm</label>
									<input class="form-control" name="giamgia"/>
								</div>

								<div class="form-group">
									<label>Ngày nhập</label>
									<input class="form-control" type="date" name="ngaynhap">
								</div>

								<div class="form-group">
									<label>Số tiền trả NCC</label>
									<input class="form-control" name="tientrancc"/>
								</div>

								<div class="form-group">
									<label>Ghi chú</label>
									<input class="form-control" name="ghichu" />
								</div>

								<button type="submit" class="btn btn-success form-control ">THÊM NHẬP KHO</button>
							</form>
						</section>
					</section>
				</div>
			</div>

		</div>
		<!-- page end-->
	</section>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$(".click").click(function(){
			var id = $(this).parent().parent().find(".id").val();
			var qty = $(this).parent().parent().find(".qty").val();
			$.ajax({
				url: '{{ route('sua-one-cart-nhap-kho') }}',
				type: 'get',
				cache: false,
				data: {"id":id, "qty":qty},
				success: function(data){
					// console.log(data);
					if(data = "ok")
					{
						alert("cập nhật thành công");
						location.reload();
					}
				}
			});
		})
	})
</script>
@endsection