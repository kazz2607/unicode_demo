<?php

namespace App\Models;
use App\Models\Owners;
use App\Models\Cars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanics extends Model
{
    use HasFactory;

    protected $table ='mechanics';

    public function carOwner(){
        return $this->hasOneThrough(
            Owners::class, // Model muốn liên kết tới
            Cars::class, //Model trung gian
            'mechanic_id', //Khoá ngoại của table trung gian
            'car_id', //Khoá ngoại của table muốn liên kết tới
            'id', //Khoá chính của table hiện tại
            'id' //Khoá chính của table trung gian
        );
    }
}
