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
                            THÊM NHÀ CUNG CẤP
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
		                        
                                <form action="admin/nhacungcap/them" method="POST">
                                	<input type="hidden" name="_token" value="{{csrf_token()}}">
	                                <div class="form-group">
	                                    <label>Tên nhà cung cấp</label>
	                                    <input class="form-control" name="tenncc" placeholder="Nhập tên người quản lý tổ chức"/>
	                                </div>
									
									<div class="form-group">
	                                    <label>Địa chỉ</label>
	                                    <input class="form-control" name="diachi" placeholder="Nhập tên người quản lý tổ chức"/>
	                                </div>

	                                <div class="form-group">
	                                    <label>SĐT</label>
	                                    <input class="form-control" name="sdt" placeholder="Nhập địa chỉ tổ chức"/>
	                                </div>

	                                <div class="form-group">
	                                    <label>Email</label>
	                                    <input class="form-control" name="email" placeholder="Nhập tên người quản lý tổ chức"/>
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
	                                    <input class="form-control" name="ghichu" placeholder="Nhập ghi chú tổ chức"/>
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