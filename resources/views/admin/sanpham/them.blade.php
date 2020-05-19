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
                        <header class="panel-heading"> THÊM SẢN PHẨM </header>
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

                                <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input class="form-control" name="tensp">
                                    </div>

                                    <div class="form-group">
                                        <label>Tên nhà cung cấp</label>
                                        <select name="tenncc" class="form-control input-sm m-bot15">
                                            @foreach($nhacungcap as $ncc)
                                            <option value="{{$ncc->idncc}}">{{$ncc->tenncc}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <select name="tennsp" class="form-control input-sm m-bot15">
                                            @foreach($nhomsanpham as $nsp)
                                            <option value="{{$nsp->idnsp}}">{{$nsp->tennsp}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Đơn vị tính</label>
                                        <select name="tendvt" class="form-control input-sm m-bot13">
                                            @foreach($donvitinh as $dvt)
                                            <option value="{{$dvt->iddvt}}">{{$dvt->tendvt}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Giá bán</label>
                                        <input class="form-control" name="giaban">
                                    </div>

                                    <div class="form-group">
                                        <label>Giá nhập</label>
                                        <input class="form-control" name="gianhap">
                                    </div>

                                    <div class="form-group">
                                        <label>Hình</label>
                                        <input type="file" class="form-control" required name="hinh" id="hinh">
                                    </div>

                                    <div class="form-group">
                                        <label>Số lượng tồn</label>
                                        <input class="form-control" name="soluongton">
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