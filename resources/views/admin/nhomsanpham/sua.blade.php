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
                            SỬA NHÓM SẢN PHẨM
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
                                <form role="form" action="admin/nhomsanpham/sua/{{$nhomsanpham->idnsp}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" name="tennsp" value="{{$nhomsanpham->tennsp}}" class="form-control" id="tennsp" placeholder="Tên danh mục">
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
                                        <input class="form-control" name="ghichu" value="{{$nhomsanpham->ghichu}}" id="ghichu">
                                    </div>
                                    <button type="submit" name="sua" class="btn btn-info">Sửa</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
    </section>
    
</section>
@endsection