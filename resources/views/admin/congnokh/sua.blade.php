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
                            SỬA CÔNG NỢ KHÁCH HÀNG
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
		                        
                                <form action="admin/congnokh/sua/{{$congnokh->idcnkh}}" method="POST">
                                	<input type="hidden" name="_token" value="{{csrf_token()}}">
	                                <div class="form-group">
                                        <label>ID hóa đơn</label>
                                        <select class="form-control" name="HoaDon">
                                        @foreach($hoadon as $hd)
                                        <option value="{{$hd->idhd}}">{{$hd->idhd}}</option>  
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Số tiền thu</label>
                                        <input class="form-control" name="sotienthu" placeholder="Nhập tên người quản lý tổ chức" value="{{$congnokh->sotienthu}}" >
                                    </div>

                                    <div class="form-group">
                                        <label>Ngày thu</label>
                                        <input class="form-control" type="date" name="ngaythu" placeholder="Nhập tên người quản lý tổ chức" value="{{$congnokh->ngaythu}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Tên nhân viên</label>
                                        <select class="form-control" name="NhanVien">
                                        @foreach($nhanvien as $nv)
                                        <option value="{{$nv->idnv}}">{{$nv->tennv}}</option>  
                                        @endforeach
                                        </select>
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
                                        <input class="form-control" name="ghichu" placeholder="Nhập tên người quản lý tổ chức" value="{{$congnokh->ghichu}}" >
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