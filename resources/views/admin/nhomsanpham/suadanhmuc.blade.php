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
                            Cập nhật danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            @foreach($suadanhmuc as $key => $edit_value)
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
                                <form role="form" action="{{URL::to('/admin/nhomsanpham/capnhatdanhmuc/'.$edit_value->idnsp)}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" name="tennsp" value="{{$edit_value->tennsp}}" class="form-control" id="tennsp" placeholder="Tên danh mục">
                                    </div>

                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <input class="form-control" name="ghichu" value="{{$edit_value->ghichu}}" id="ghichu">
                                    </div>
                                    <button type="submit" name="capnhatdanhmuc" class="btn btn-info">Cập Nhật</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </div>
    </section>
    
</section>
@endsection