<!-- Page Content -->
    @extends('admin.layout.index')
    @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    @if(session('thongbao'))
                        <div class="col-lg-12">
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        </div>
                    @endif

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu Đề</th>
                                <th>Hình Ảnh</th>
                                <th>Thể Loại</th>
                                <th>Đơn Giá</th>
                                <th>Khuyến Mại</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sanpham as $row)
                            <tr class="odd gradeX" align="center">
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td><img width="90" src="upload/product/{{$row->image}}"></td>
                                <td>{{$row->product_type->name}}</td>
                                <td>{{number_format($row->unit_price)}} VNĐ</td>
                                <td>{{number_format($row->promotion_price)}} VNĐ</td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/sanpham/delete/{{$row->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/sanpham/edit/{{$row->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    @endsection
<!-- /#page-wrapper -->