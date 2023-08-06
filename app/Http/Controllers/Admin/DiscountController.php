<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DiscountController extends Controller
{
    //
    public function index() {
        $discount = Discount::all();
        return view('admin.discount.index',compact('discount'));
    }
    public function create(DiscountRequest $request) {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $params['image'] = uploadFile('image',$request->file('image'));
            }
           $discount = Discount::create($params);
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
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                //có file mới upload lên sẽ link vào để xóa ảnh cũ đi
              $resultDL = Storage::delete('/public/'.$discount->image);
              if ($resultDL) {
                  $params['image'] = uploadFile('image',$request->file('image'));
              }
            } else {
                $params['image'] = $discount->image;
            }
           $result = Discount::where('id',$id)->update($params);
           if ($result) {
               Session::flash('success','sửa thành công ');
               return redirect()->route('discount.index',['id'=>$id]);
           }
        }
        return view('admin.discount.edit', compact('discount'));
    }

    public function delete(DiscountRequest $request,$id){
        Discount::where('id',$id)->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('discount.index');
    }

}
