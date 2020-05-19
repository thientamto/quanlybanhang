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
							THÊM TRẢ HÀNG
						</header>

						<div class="panel-body">
							<div class="position-center">
								@if(count($errors)>0)
								<div class="alert alert-danger">
									@foreach($errors->all() as $err)
									{{$err}}<br>
									@endforeach
								</div>
								@endif

								@if(session('thongbao'))
								<div class="alert alert-success">
									{{session('thongbao')}}
								</div>
								@endif

								<form action="{{ route('them-san-pham-tra-hang') }}" method="get">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<div class="form-group">
										<label>ID hóa đơn</label>
										<select class="form-control" name="HoaDon" id="hoadon">
											<option>------Chọn hóa đơn------</option>
											@foreach($hoadon as $hd)
											<option value="{{$hd->idhd}}">{{$hd->idhd}}</option>  
											@endforeach
										</select>
									</div>

									<div class="form-group">
										<label>Sản phẩm cần trả</label>
										<select class="form-control" name="idcthd" id="chitiethoadon">
										</select>
									</div>
									<div class="form-group">
										<label>Số lượng ban đầu</label>
										<input type="number" disabled="" class="form-control" id="soluong" placeholder="Nhập so luong"/>
									</div>
									<div class="form-group">
										<label>Số lượng cần trả</label>
										<input type="number" class="form-control" name="soluong" value="1" min="1" placeholder="Nhập so luong"/>
									</div>
									<div class="form-group">
										<input type="hidden" name="dvt" id="dvt" class="form-control">
									</div>
									<button type="submit" class="btn btn-info">Trả Hàng</button>
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$("#hoadon").change(function(){
			var key = $(this).val();

			$.ajax({
				url: '{{ route('ajax-layhoadon') }}',
				type: 'get',
				cache: false,
				data: {"key":key},
				success: function(data){
					document.getElementById('chitiethoadon').innerHTML = data;
				}
			});
		})

		$("#chitiethoadon").change(function(){
			var key2 = $(this).val();
			// console.log(key2);
			$.ajax({
				url: '{{ route('ajax-laysoluong') }}',
				type: 'get',
				cache: false,
				data: {"key2":key2},
				success: function(data){
					document.getElementById('soluong').value = data;
					// console.log(data);
				}
			});
		})

		$("#chitiethoadon").change(function(){
			var key2 = $(this).val();
			// console.log(key2);
			$.ajax({
				url: '{{ route('ajax-laydvt') }}',
				type: 'get',
				cache: false,
				data: {"key2":key2},
				success: function(data){
					document.getElementById('dvt').value = data;
					// console.log(data);
				}
			});
		})
	})
</script>
@endsection