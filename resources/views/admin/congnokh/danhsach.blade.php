@extends('admin.layout.index')

@section('content')

<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">CÔNG NỢ KHÁCH HÀNG</div>
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
                <th>ID hóa đơn</th>
                <th>Số tiền thu</th>
                <th>Ngày thu</th>
                <th>Tên Admin</th>
                <th>Tên tổ chức</th>
                <th>Ghi chú</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody id="myTable">
              @foreach($congnokh as $cnkh)
              <?php 
                $nhanvien = \App\User::where('id', $cnkh['idnv'])->first();
                $tochuc = \App\ToChuc::where('idtc', $cnkh['idtc'])->first();
              ?>
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{$cnkh->idcnkh}}</td>
                <td>{{$cnkh->idhd}}</td>
                <td>{{$cnkh->sotienthu}}</td>
                <td>{{$cnkh->ngaythu}}</td>
                <td>{{ $nhanvien->name }}</td>
                <td>{{ $tochuc->tentc }}</td>
                <td>{{$cnkh->ghichu}}</td>
                <td>
                  <a href="admin/congnokh/sua/{{$cnkh->idcnkh}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a onclick="return confirm('Bạn có muốn xóa?')" href="admin/congnokh/xoa/{{$cnkh->idcnkh}}" class="active styling-edit" ui-toggle-class="">
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