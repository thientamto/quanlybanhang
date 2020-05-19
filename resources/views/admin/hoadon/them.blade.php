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
                            THÊM HÓA ĐƠN
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
		                        
                                <form action="admin/hoadon/them" method="POST">
                                	<input type="hidden" name="_token" value="{{csrf_token()}}">
	                                <div class="form-group">
	                                    <label>Tên nhân viên</label>
	                                    <select class="form-control" name="NhanVien">
                                    	@foreach($nhanvien as $nv)
                                    	<option value="{{$nv->idnv}}">{{$nv->tennv}}</option>  
                                    	@endforeach
                                		</select>
	                                </div>
									
									<div class="form-group">
	                                    <label>Ngày tạo </label>
	                                    <input class="form-control" type="date" name="ngaytao" placeholder="Nhập tên người quản lý tổ chức"/>
	                                </div>

	                                <div class="form-group">
	                                    <label>Tên khách hàng</label>
	                                    <select class="form-control" name="KhachHang">
                                    	@foreach($khachhang as $kh)
                                    	<option value="{{$kh->idkh}}">{{$kh->tenkh}}</option>  
                                    	@endforeach
                                		</select>
	                                </div>

	                                <div class="form-group">
	                                    <label>Tổng tiền</label>
	                                    <input class="form-control" name="tongtien" placeholder="Nhập địa chỉ tổ chức"/>
	                                </div>

	                                <div class="form-group">
	                                    <label>Giảm giá</label>
	                                    <input class="form-control" name="giamgia" placeholder="Nhập địa chỉ tổ chức"/>
	                                </div>

	                                <div class="form-group">
	                                    <label>Tiền khách trả</label>
	                                    <input class="form-control" name="khtra" placeholder="Nhập địa chỉ tổ chức"/>
	                                </div>

	                                <div class="form-group">
	                                    <label>Tình trạng</label>
	                                    <input class="form-control" name="tinhtrang" placeholder="Nhập địa chỉ tổ chức"/>
	                                </div>

	                                <div class="form-group">
	                                    <label>Tên tổ chức</label>
	                                    <input type="hidden" name="ToChuc" value="{{
                                        $tochuc->idtc
                                    }}">
                                        <input type="text" disabled="" class="form-control" value="{{
                                        $tochuc->tentc
                                    }}">
	                                </div>
                                	<button type="submit" class="btn btn-info">Thêm</button>
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

@endsection