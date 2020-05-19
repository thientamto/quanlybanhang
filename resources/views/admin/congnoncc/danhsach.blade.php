@extends('admin.layout.index')

@section('content')

<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">CÔNG NỢ NHÀ CUNG CẤP</div>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs"></div>
          <div class="col-sm-4"></div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" id="myInput" class="input-sm form-control" placeholder="Search">
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
                <th>Tên nhà cung cấp</th>
                <th>Số tiền thu</th>
                <th>Số tiền con no</th>
                <th>Ngày trả</th>
                <th>Tên tổ chức</th>
                <th>Ghi chú</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody id="myTable">
              @foreach($congnoncc as $cnncc)
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$cnncc['idcnncc']}}</td>
                <td>{{$cnncc['idncc']}}</td>
                <td>{{$cnncc['sotienthu']}}</td>
                <td>{{$cnncc['sotienno']}}</td>
                <td>{{$cnncc['ngaytra']}}</td>
                <td>{{$cnncc->tochuc['tentc']}}</td>
                <td>{{$cnncc['ghichu']}}</td>
                <td>
                  <a href="" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a onclick="return confirm('Bạn có muốn xóa?')" href="" class="active styling-edit" ui-toggle-class="">
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
<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
@endsection
