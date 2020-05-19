@extends('admin.layout.index')

@section('content')

<section id="main-content">
    <section class="wrapper">
        <div class="form-w3layouts">
            <!-- page start-->
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
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
                                <form role="form" action="{{URL::to('/admin/nhomsanpham/luudanhmuc')}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input name="tennsp" class="form-control" id="tennsp" placeholder="Tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên tổ chức</label>
                                        <select name="ToChuc" class="form-control input-sm m-bot15">
                                            @foreach($tochuc as $tc)
                                            <option value="{{$tc->idtc}}">{{$tc->tentc}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ghi chú</label>
                                        <input class="form-control" name="ghichu" id="ghichu" placeholder="Mô tả danh mục">
                                    </div>

                                    <button type="submit" name="luudanhmuc" class="btn btn-info">Thêm Danh Mục</button>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
    </section>
    <!-- footer -->
    
</section>
@endsection