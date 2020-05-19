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
                            THÊM HÓA ĐƠN NCC
                        </header>s

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
		                        
                                <form action="admin/hoadonncc/them" method="POST">
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
	                                    <label>Tên nhà cung cấp</label>
	                                    <select class="form-control" name="NhaCungCap">
                                    	@foreach($nhacungcap as $ncc)
                                    	<option value="{{$ncc->idncc}}">{{$ncc->tenncc}}</option>  
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
	                                    <label>Tiền trả</label>
	                                    <input class="form-control" name="sotientra" placeholder="Nhập địa chỉ tổ chức"/>
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

	                                <div class="form-group">
	                                    <label>Ghi chú</label>
	                                    <input class="form-control" name="ghichu" placeholder="Nhập địa chỉ tổ chức"/>
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