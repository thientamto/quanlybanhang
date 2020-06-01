<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="admin">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Tổ Chức</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/tochuc/danhsach">Danh sách</a></li>
                        <li><a href="admin/tochuc/them">Thêm</a></li>
                    </ul>
                </li> -->

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Bán Hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/banhang/banhang">Bán hàng</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Nhóm sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/nhomsanpham/danhsach">Danh sách</a></li>
                        <li><a href="admin/nhomsanpham/them">Thêm</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/sanpham/danhsach">Danh sách</a></li>
                        <!-- <li><a href="admin/sanpham/them">Thêm</a></li> -->
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Nhập Kho</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('nhap-kho') }}">Nhập kho</a></li>
                        <li><a href="admin/nhapkho/danhsach">Danh sách</a></li>
                    </ul>
                </li>
                

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Nhà Cung Cấp</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/nhacungcap/danhsach">Danh sách</a></li>
                        <li><a href="admin/nhacungcap/them">Thêm</a></li>
                    </ul>
                </li>

                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Nhập Kho</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/nhapkho/them">Thêm</a></li>
                    </ul>
                </li> -->

                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Chi Tiết Nhập</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/chitietnhap/danhsach">Danh sách</a></li>
                        <li><a href="admin/chitietnhap/them">Thêm</a></li>
                    </ul>
                </li> -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Hóa Đơn</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Hóa Đơn Khách Hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="admin/hoadon/danhsach">Danh sách</a></li>
                                <li><a href="admin/hoadon/them">Thêm</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Hóa Đơn Nhà Cung Cấp</span>
                            </a>
                            <ul class="sub">
                                <li><a href="admin/hoadonncc/danhsach">Danh sách</a></li>
                                <li><a href="admin/hoadonncc/them">Thêm</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Chi Tiết Hóa Đơn</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/chitiethoadon/danhsach">Danh sách</a></li>
                        <li><a href="admin/chitiethoadon/them">Thêm</a></li>
                    </ul>
                </li> -->

                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Chi Tiết Hóa Đơn NCC</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/chitiethoadonncc/danhsach">Danh sách</a></li>
                        <li><a href="admin/chitiethoadonncc/them">Thêm</a></li>
                    </ul>
                </li> -->

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Công Nợ</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Công Nợ Khách Hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="admin/congnokh/danhsach">Danh sách</a></li>
                                <li><a href="admin/congnokh/them">Thêm</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Công Nợ Nhà Cung Cấp</span>
                            </a>
                            <ul class="sub">
                                <li><a href="admin/congnoncc/danhsach">Danh sách</a></li>
                                <li><a href="admin/congnoncc/them">Thêm</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Trả Hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/trahang/danhsach">Danh sách</a></li>
                        <li><a href="admin/trahang/them">Thêm</a></li>
                    </ul>
                </li>

                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Chi Tiết Trả Hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/chitiettrahang/danhsach">Danh sách</a></li>
                        <li><a href="admin/chitiettrahang/them">Thêm</a></li>
                    </ul>
                </li> -->

                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Khách Hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/khachhang/danhsach">Danh sách</a></li>
                        <li><a href="admin/khachhang/them">Thêm</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Nhân Viên</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/nhanvien/danhsach">Danh sách</a></li>
                        <li><a href="{{route('them')}}">Thêm</a></li>
                    </ul>
                </li>

                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Kho</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/kho/danhsach">Danh sách</a></li>
                        <li><a href="admin/kho/them">Thêm</a></li>
                    </ul>
                </li> -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Đơn vị tính</span>
                    </a>
                    <ul class="sub">
                        <li><a href="admin/donvitinh/danhsach">Danh sách</a></li>
                        <li><a href="admin/donvitinh/them">Thêm</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>