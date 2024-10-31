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
        $list = 
        // Thẻ meta
        $meta['title'] ='Danh sách bài viết';
        $meta['description'] ='Danh sách bài viết';
        $meta['image'] ='';
        // Return View 
        return view('backend.posts.index',compact('meta','list'));
    }
}
