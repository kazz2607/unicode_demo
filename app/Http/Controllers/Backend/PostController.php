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
       
        //$list = PostModel::all();
        $list = PostModel::withTrashed()->get();
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
            if ($status){
                $msg = 'Đã xoá '.count($deleteArr).' mục thành công';
            }else{
                $msg = 'Bạn không thể xoá mục này ! Vui lòng thử lại sau';
            }
            return redirect()->route('posts.index')->with('msg', $msg);
        }
        return redirect()->route('posts.index')->with('msg','Vui lòng chọn mục muốn xoá');
    }

    public function delete($id){
        $post = PostModel::where('id',$id)->first();
        if(!empty($post)){
            $post->delete();
            $msg = 'Xoá mục thành công';
        }else{
            $msg = 'Mục không tồn tại';
        }
        return redirect()->route('posts.index')->with('msg',$msg);
    }

    public function restore($id){
        $post = PostModel::onlyTrashed()->where('id',$id)->first();
        if(!empty($post)){
            $post->restore();
            $msg = 'Khôi phục mục thành công';
        }else{
            $msg = 'Bài viết không tồn tại';
        }
        return redirect()->route('posts.index')->with('msg',$msg);
    }

    public function forceDelete($id){
        $post = PostModel::onlyTrashed()->where('id',$id)->first();
        if($post){
            $post->forceDelete();
            $msg = 'Xoá vĩnh viễn mục thành công';
        }else{
            $msg = 'Bài viết không tồn tại ! Vui lòng thử lại sau';
        }
        return redirect()->route('posts.index')->with('msg',$msg);
    }
}
