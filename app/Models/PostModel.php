<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostModel extends Model
{
    use HasFactory, SoftDeletes;

    /** Quy ước tên table
     *  Tên Model : Post => table : posts
     *  Tên Model : ProductCategory : product_categories
    */

    protected $table = 'posts';

    /** Quy ước khoá chính
     * 
     * 
    */

    public $timestamps = true;

    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';

    protected $fillable = [
        'title',
        'content',
        'status'
    ];
}
