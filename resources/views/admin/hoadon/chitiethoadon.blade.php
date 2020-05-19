@extends('admin.layout.index')

@section('content')

<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">CHI TIẾT HÓA ĐƠN</div>
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
                <th>ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>ID hóa đơn</th>
                <th>Trạng thái</th>

              </tr>
            </thead>
            <tbody id="myTable">
              @foreach($chitiethoadon as $cthd)
              <?php 
                $sanpham = \App\SanPham::where('idsp', $cthd['idsp'])->first();
                // $donvitinh = \App\DonViTinh::where('iddvt', $ctth['iddvt'])->first();
              ?>
              <tr>
                <td>{{ $cthd['idcthd'] }}</td>
                <td>{{ $sanpham->tensp }}</td>
                <td>{{ $cthd['soluong'] }}</td>
                <td>{{ number_format($cthd['gia']) }} Vnd</td>
                <td>{{ $cthd['idhd'] }}</td>
                <td>{{ $cthd->trangthai }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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