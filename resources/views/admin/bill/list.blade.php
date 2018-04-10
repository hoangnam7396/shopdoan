<!-- Page Content -->
    @extends('admin.layout.index')
    @section('content')

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn Hàng
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <div class="col-md-12">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                    </div>

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Khách Hàng</th>
                                <th>Tổng Tiền</th>
                                <th>Phương Thức</th>
                                <th>Ngày Tạo</th>
                                <th>Trạng Thái</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bill as $row)
                            <tr class="odd gradeX" align="center">
                                <td>{{$row->id}}</td>
                                <td><a href="admin/customer/edit/{{$row->customer->id}}">{{$row->customer->name}}</a></td>
                                <td>{{number_format($row->total)}} VNĐ</td>
                                <td>{{$row->payment}}</td>
                                <td>{{date('d/m/Y',strtotime($row->date_order))}}</td>
                                <td>
                                    @if ($row->status == 0)
                                        <span style="color: darkviolet">chờ xử lý</span>
                                    @elseif ($row->status == 1)
                                        <span style="color: #761c19">đang xử lý</span>
                                    @elseif ($row->status == 2)
                                        <span style="color: blue">đang vận chuyển</span>
                                    @elseif ($row->status == 3)
                                        <span style="color: green">đã thanh toán</span>
                                    @elseif ($row->status == 4)
                                        <span style="color: red">hủy</span>
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/bill/delete/{{$row->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/bill/edit/{{$row->id}}">Edit</a></td>
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