<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Categories;
use App\Models\Comments;
use App\Models\Votes;

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

    public function categories(){
        return $this->belongsToMany(
            Categories::class,
            'categories_posts',
            'post_id',
            'category_id'
        )
        ->withPivot('create_at','status')
        ->wherePivot('status', 1);
    }

    public function comments(){
        return $this->hasMany(
            Comments::class,
            'post_id',
            'id',
        );
    }

    public function votes(){
        return $this->hasMany(
            Votes::class,
            'post_id',
            'id',
        );
    }
}
