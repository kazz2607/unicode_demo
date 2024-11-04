<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostModel;
use App\Models\UsersModel;

class Country extends Model
{
    use HasFactory;

    protected $table= 'country';

    public function posts(){
        return $this->hasManyThrough(
            PostModel::class,
            UsersModel::class,
            'country_id',
            'user_id',
            'id',
            'id'
        );
    }
}
