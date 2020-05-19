@extends('admin.layout.index')

@section('content')

<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">CHI TIẾT HÓA ĐƠN NCC</div>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs"></div>
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Tìm</button>
              </span>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          @if(session('thongbao'))
            <div class="alert alert-success">
              {{session('thongbao')}}
            </div>
          @endif

          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th style="width:30px;">
                  <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                  </label>
                </th>
                <th>ID</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Đơn vị tính</th>
                <th>ID hóa đơn NCC</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($chitiethoadonncc as $cthdncc)
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$cthdncc->idcthdncc}}</td>
                <td>{{$cthdncc->soluong}}</td>
                <td>{{$cthdncc->gia}}</td>
                <td>{{$cthdncc->donvitinh->tendvt}}</td>
                <td>{{$cthdncc->idhdncc}}</td>
                <td>
                  <a href="admin/chitiethoadonncc/sua/{{$cthdncc->cthdncc}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a onclick="return confirm('Bạn có muốn xóa?')" href="admin/chitiethoadonncc/xoa/{{$ctcthdncchd->cthdncc}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</section>
@endsection
