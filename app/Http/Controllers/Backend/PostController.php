<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostModel;

class PostController extends Controller
{
    public function __construct(){

    }

    public function index(){
       
        $list = PostModel::all();
        //Thẻ meta
        $meta['title'] ='Danh sách bài viết';
        $meta['description'] ='Danh sách bài viết';
        // Return View 
        return view('backend.posts.index',compact('meta','list'));
    }

    public function create(){

    }

    public function handleDeleteAny(Request $request){
        //dd($request);
        $deleteArr = $request->delete;
        //
        if(!empty($deleteArr)){
            $status = PostModel::destroy($deleteArr);
            //dd($status);
            if ($status){
                $msg = 'Đã xoá '.count($deleteArr).' mục thành công';
            }else{
                $msg = 'Bạn không thể xoá mục này ! Vui lòng thử lại sau';
            }
            return redirect()->route('posts.index')->with('msg', $msg);
        }
        return redirect()->route('posts.index')->with('msg','Vui lòng chọn mục muốn xoá');
    }
}
