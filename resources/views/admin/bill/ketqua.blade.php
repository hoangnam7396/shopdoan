
<div id="noidung">
    @if($active==1)
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>ID</th>
            <th>Tên Khách Hàng</th>
            <th>Tổng Tiền</th>
            <th>Phương Thức</th>
            <th>Ngày Tạo</th>
            <th>Ngày Thanh Toán</th>
            <th>Trạng Thái</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $row)
            <tr class="odd gradeX" align="center">
                <td>{{$row->id}}</td>
                <td><a href="admin/customer/edit/{{$row->customer->id}}">{{$row->customer->name}}</a></td>
                <td>{{number_format($row->total)}} VNĐ</td>
                <td>{{$row->payment}}</td>
                <td>{{date('d/m/Y',strtotime($row->date_order))}}</td>
                <td>{{date('d/m/Y',strtotime($row->updated_at))}}</td>
                <td>
                    <span style="color: green">đã thanh toán</span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p>Tổng tiền thu được từ ngày {{date('d-m-Y',strtotime($from))}} đến ngày {{date('d-m-Y',strtotime($to))}}: {{number_format($total_all)}} VNĐ</p>
        @elseif($active==0)
        <p style="color: red">Vui lòng nhập đủ trường: "Từ ngày" và "Đến ngày" !</p>
        @endif

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-panel-default">
                        <div class="panel-heading">
                            <h4>
                                <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Export</a>

                            </h4>
                            <body>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <label>Import</label>
                                <input type="file" name="file"></br>
                                <button type="submit">Import</button>
                            </form>
                            </body>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript">
        function addForm() {
            save.method = "add"
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Export');
        }
        {{--function addForm() {--}}

            {{--$('#modal-exim').modal('show');--}}
            {{--$('#modal-exim form')[0].reset();--}}

        {{--}--}}
    </script>
</div>

