<!-- Page Content -->
    @extends('admin.layout.index')
    @section('content')

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn Hàng
                            <small>Báo Cáo/Thống Kê</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->

                    <h3>Đơn Hàng</h3>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr align="center">
                            <th>Tổng số đơn</th>
                            <th>Chờ xử lý</th>
                            <th>Đang xử lý</th>
                            <th>Đang vận chuyển</th>
                            <th>Đã thanh toán</th>
                            <th>Hủy</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($bill as $key=>$row){
                                switch ($row->status){
                                    case 1: $processing[$key]=$row->id;
                                    break;
                                    case 2: $transporting[$key]=$row->id;
                                        break;
                                    case 3: $paid[$key]=$row->id;$paid_money[$key]=$row->total;
                                        break;
                                    case 4: $cancel[$key]=$row->id;
                                        break;
                                    default:$wait[$key]=$row->id;
                                }

                            }
                        ?>

                        <tr class="odd gradeX" align="center">
                            <td>
                                @if(isset($bill))
                                    {{count($bill)}}
                                @else
                                    0
                                @endif
                            </td>
                            <td>
                                @if(isset($wait))
                                    {{count($wait)}}
                                @else
                                    0
                                @endif
                            </td>
                            <td>
                                @if(isset($processing))
                                    {{count($processing)}}
                                @else
                                    0
                                @endif
                            </td>
                            <td>
                                @if(isset($transporting))
                                    {{count($transporting)}}
                                @else
                                    0
                                @endif
                            </td>
                            <td>
                                @if(isset($paid))
                                    {{count($paid)}}
                                @else
                                    0
                                @endif
                            </td>
                            <td>
                                @if(isset($cancel))
                                    {{count($cancel)}}
                                    @else
                                    0
                                @endif
                            </td>

                        </tr>
                        </tbody>
                    </table>
                    <h3>Doanh Thu</h3>
                    <div class="container">
                        <div class="row">

                            <form class="col-md-8">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                                <div class="col-md-6">
                                    <p>Từ ngày:</p>
                                    <div class='col-sm-12'>
                                        <input type='text' class="form-control dateinput"  name="from" id="from"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>Đến ngày:</p>
                                    <div class='col-sm-12'>
                                        <input type='text' class="form-control dateinput"  name="to" id="to" />
                                    </div>
                                </div>
                                <button class="btn btn-info" type="button" style="margin:4%" id="view">Xem</button>
                            </form>
                        </div>
                    </div>
                    <div class="container">
                        <div id="noidung"></div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

    @endsection
@section('script')
    <script>
        $(function () {
            $('.dateinput').datetimepicker({
                format: 'DD-MM-YYYY'
            });
        });
        $('#view').click(function() {
            var from=$('#from').val();
            var to=$('#to').val();
            var _token=$('#token').val();
            $.ajax({
                url: '{{route('bill.load_report')}}',
                type: 'POST',
                data: {
                    "_token": _token,
                    from: from,
                    to:to
                },
                success:function(data) {
                    console.log(data);
                    $('#noidung').html(data);
                }
            });

        });
    </script>
    @endsection
<!-- /#page-wrapper -->