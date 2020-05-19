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
                            SỬA NHẬP KHO
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
		                        
                                <form action="admin/nhapkho/sua/{{$nhapkho->idnhap}}" method="POST">
                                	<input type="hidden" name="_token" value="{{csrf_token()}}">
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
	                                    <label>Số tiền nhập </label>
	                                    <input class="form-control" name="tonggia" placeholder="Nhập tên người quản lý tổ chức" value="{{$nhapkho->tonggia}}">
	                                </div>

	                                <div class="form-group">
	                                    <label>Số tiền giảm</label>
	                                    <input class="form-control" name="giamgia" placeholder="Nhập địa chỉ tổ chức" value="{{$nhapkho->giamgia}}">
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
	                                    <label>Số tiền trả NCC</label>
	                                    <input class="form-control" name="tientrancc" placeholder="Nhập sdt tổ chức" value="{{$nhapkho->tientrancc}}"">
	                                </div>

	                                <div class="form-group">
	                                    <label>Ngày nhập</label>
	                                    <input class="form-control" type="date" name="ngaynhap" placeholder="Nhập địa chỉ tổ chức" value="{{$nhapkho->ngaynhap}}">
	                                </div>

	                                 <div class="form-group">
	                                    <label>Ghi chú</label>
	                                    <input class="form-control" name="ghichu" placeholder="Nhập ghi chú tổ chức" value="{{$nhapkho->ghichus}}">
	                                </div>

                                	<button type="submit" class="btn btn-info">Sửa</button>
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