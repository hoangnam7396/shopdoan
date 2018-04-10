<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Bills;
use App\BillsDetail;
use DateTime;

class BillController extends Controller
{
    public function getList()
    {
        $bill = Bills::all();
        return view("admin.bill.list",['bill'=>$bill]);
    }

    public function getEdit($id)
    {
        $bill=Bills::findOrFail($id);
        $detail=BillsDetail::where('id_bill',$id)->get();
        return view('admin/bill/edit',compact('bill','detail'));
    }

    public function getDel($id)
    {
    	$hoadon = Bills::find($id);
        $sanpham = BillsDetail::where('id_bill','=',$id);
        $sanpham->delete();
        $hoadon->delete();
        return redirect('admin/bill/list')->with('thongbao','Bạn đã xóa đơn hàng thành công');
    }

    public function delProduct($id_bill, $id_product)
    {
        $pro_del = BillsDetail::find($id_product);
        $donhang = Bills::find($id_bill);
        $total = ($donhang->total) - ($pro_del->unit_price);
        $donhang->total = $total;
        $donhang->save();
        $pro_del->delete();
        return redirect('admin/bill/edit/'.$id_bill)->with('thongbao','Bạn đã xóa sản phẩm trong đơn hàng');
    }
    public function report(){
        $bill = Bills::all();
//        dd($bill);
        return view("admin.bill.report",compact('bill'));
    }
    public function postEdit(Request $request,$id){
//        dd($request->all());
        $bill=Bills::find($id);
        $bill->payment=$request->payment;
        $bill->note=$request->note;
        $bill->status=$request->status;
        if ($bill->save()){
            $mess='Sửa thành công đơn hàng có Id:'.$id;
            return redirect()->route('bill.list')->with('thongbao',$mess);
        }else{
            return back()->with('thongbao','Sửa thất bại công !');
        }
    }
    public function loadReport(Request $request){
        if (isset($request->from) and isset($request->to)){
            $from=date('Y-m-d',strtotime($request->from));
            $to=date('Y-m-d',strtotime($request->to));
            $data=Bills::where('status',3);
            $to_date=date('Y-m-d H:i:s',strtotime("$request->to + 1day"));
            $data=$data->where('updated_at','>=',$from)->where('updated_at','<=',$to_date);
            $total_all=Bills::where('status',3)->where('updated_at','>=',$from)->where('updated_at','<=',$to_date)->sum('total');
            $data=$data->get();
            $active=1;
            return view('admin.bill.ketqua',compact('data','total_all','from','to','active'));
        }else{
            $active=0;
            return view('admin.bill.ketqua',compact('active'));
        }

    }
}
