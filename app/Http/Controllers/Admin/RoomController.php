<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomRequest;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    //
    public function index(){
        $room = Room::all();
        // $type_room = Type::find(1);
        // $type = $type_room->type;
        return view('admin.room.index', compact('room'));
    }

    public function create(RoomRequest $request) {
        $type_room = Type::all();
        if ($request->isMethod('POST')) {
           $params = $request->except('_token');
           if ($request->hasFile('image') && $request->file('image')->isValid()) {
               $params['image'] = uploadFile('image',$request->file('image'));
           }
          $room = Room::create($params);
          if ($room->id) {
              Session::flash('success','thêm mới thành công');
              return redirect()->route('room.index');
          }
        }
        return view('admin.room.create',compact('type_room'));
    }

    public function edit(RoomRequest $request, $id){
        $room = Room::find($id);
        $type_room = Type::all();
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            //
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                //có file mới upload lên sẽ link vào để xóa ảnh cũ đi
              $resultDL = Storage::delete('/public/'.$room->image);
              if ($resultDL) {
                  $params['image'] = uploadFile('image',$request->file('image'));
              }
            } else {
                $params['image'] = $room->image;
            }
           $result = Room::where('id',$id)->update($params);
           if ($result) {
               Session::flash('success','sửa thành công ');
               return redirect()->route('room.index',['id'=>$id]);
           }
        }
        return view('admin.room.edit',compact('room','type_room'));
    }

    public function delete($id) {
        Room::where('id',$id)->delete();
        Session::flash('success','xóa thành công');
        return redirect()->route('room.index');
    }
}
