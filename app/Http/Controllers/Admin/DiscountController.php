<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DiscountController extends Controller
{
    //
    public function index() {
        $discount = Discount::all();
        return view('admin.discount.index',compact('discount'));
    }
    public function create(DiscountRequest $request) {
        if($request->isMethod('Post')) {
            $discount = Discount::create($request->except('_token'));
            if ($discount->id) {
                Session::flash('success','thêm mới thành công');
                return redirect()->route('discount.index');
            }
        }
        return view('admin.discount.create');
    }

    public function edit(DiscountRequest $request,$id){
        $discount = Discount::find($id);
        if($request->isMethod('POST')) {
            $result  = Discount::where('id',$id)->update($request->except('_token'));
            if($result){
                Session::flash('success','sửa thành công');
                return redirect()->route('discount.index');
            }
        }
        return view('admin.discount.edit',compact('discount'));
    }

    public function delete(DiscountRequest $request,$id){
        Discount::where('id',$id)->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('discount.index');
    }

}
