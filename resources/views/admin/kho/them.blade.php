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
                            THÊM KHO
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
                                
                                <form action="admin/kho/them" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label>Tên kho</label>
                                        <input class="form-control" name="tenkho">
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
                                        <label>Địa chỉ</label>
                                        <input class="form-control" name="diachi">
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