<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostModel;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public $timestamps = true;

    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';

    protected $fillable = [
        'name',
        'status'
    ];

    public function posts(){
        return $this->belongsToMany(
            PostModel::class,
            'categories_posts',
            'category_id',
            'post_id'
        );
    }
}
