<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;

    /** Quy ước tên table
     *  Tên Model : Post => table : posts
     *  Tên Model : ProductCategory : product_categories
    */

    protected $table = 'posts';

    /** Quy ước khoá chính
     * 
     * 
    */

}
