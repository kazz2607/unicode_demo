<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){


        // Thẻ meta
        $meta['title'] ='Trang quản trị';
        $meta['description'] ='Mô tả trang quản trị';
        $meta['image'] ='';
        // Return View 
        return view('backend.dashboard.index', compact('meta'));
    }
}
