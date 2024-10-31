<?php
use App\Models\GroupsModel;

function isUppercase ($value, $message, $fail){
    if ($value != mb_strtoupper($value,'UTF-8')){
        // Xảy ra lỗi
        $fail($message);
    }
}

function getAllGroup(){
    $group = new GroupsModel;
    return $group->getAll();
}