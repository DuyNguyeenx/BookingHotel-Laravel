<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function create(UserRequest $request){
        if($request->isMethod('POST')) {
            $users = User::create($request->except('_token'));
            if ($users->id) {
                Session::flash('success','thêm mới thành công');
                return redirect()->route('user.index');
            }
          }
          return view('admin.user.create');
        }

    public function edit(UserRequest $request,$id){
        $users = User::find($id);
        if($request->isMethod('POST')) {
            $result  = User::where('id',$id)->update($request->except('_token'));
            if($result){
                Session::flash('success','sửa thành công');
                return redirect()->route('user.index');
            }
        }
        return view('admin.user.edit',compact('users'));
    }

    public function delete(UserRequest $request,$id){
        User::where('id',$id)->delete();
        Session::flash('success','Xóa thành công');
        return redirect()->route('user.index');
    }
}
