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
                            Thêm Nhân Viên
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

                                <form action="admin/nhanvien/them" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label>Tên nhân viên</label>
                                        <input class="form-control" name="tennv">
                                    </div>

                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input class="form-control" type="date" name="ngaysinh">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input class="form-control" name="diachi">
                                    </div>

                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" name="sdt">
                                    </div>

                                    <div class="form-group">
                                        <label>Giới tính</label><br>
                                        <label class="radio-inline">
                                            <input name="gioitinh" value="nam" checked="" type="radio">Nam
                                        </label>
                                        <label class="radio-inline">
                                            <input name="gioitinh" value="nữ" type="radio">Nữ
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email">
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
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Ghi chú</label>
                                        <input class="form-control" name="ghichu">
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