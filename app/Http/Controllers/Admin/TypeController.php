<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TypeRequest;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    //
    public function index(){
        $type = Type::all();
        return view('admin.type.index', compact('type'));
    }
    public function create(TypeRequest $request){
        if($request->isMethod('POST')) {
            $type = Type::create($request->except('_token'));
            if ($type->id) {
                Session::flash('success','thêm mới thành công');
                return redirect()->route('type.index');
            }
          }
          return view('admin.type.create');
        }

    public function edit(TypeRequest $request,$id){
        $type = Type::find($id);
        if($request->isMethod('POST')) {
            $result  = Type::where('id',$id)->update($request->except('_token'));
            if($result){
                Session::flash('success','sửa thành công');
                return redirect()->route('type.index');
            }
        }
        return view('admin.type.edit',compact('type'));
    }

    public function delete(TypeRequest $request,$id){
        Type::where('id',$id)->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('type.index');
    }

    }

