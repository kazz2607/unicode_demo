<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\PhoneModel;

class UsersModel extends Model
{
    use HasFactory;

    protected $table ='users';

    public function getAllUsers($filters,$keyword,$sort,$page){
        //DB::enableQueryLog();

        $users = DB::table($this->table)
        ->select('users.*', 'groups.name as group_name')
        ->join('groups','users.group_id','=','groups.id')
        ->where('trash',0); 
        $oderBy ='users.create_at';
        $oderType ='desc';
        //dd($sort);
        if (!empty($sort) && is_array($sort)){
            if (!empty($sort['sort_by']) && !empty($sort['sort_type']) ){
                $oderBy = trim($sort['sort_by']);
                $oderType = trim($sort['sort_type']); 
            } 
        }
        $users = $users->orderBy($oderBy,$oderType);

        if (!empty($filters)){
            $users = $users->where($filters);
        }

        if(!empty($keyword)){
            $users = $users->where(function($query) use($keyword){
                $query->orWhere('users.name', 'like', '%'.$keyword.'%');
                $query->orWhere('users.email', 'like', '%'.$keyword.'%');
            });
        }
        if (!empty($page)){
            $users = $users->paginate($page)->withQueryString();
        }else{
            $users = $users->get();
        }
    
        return $users; 
    }

    public function getDetailUsers($id){
        $users = DB::table($this->table)->where('id',$id)->first();
        return $users; 
    }

    public function addUser($data){
        $users = DB::table($this->table)->insert($data);
        return $users;
    }

    public function updateUser($id,$data){
        $users = DB::table($this->table)->where('id',$id)->update($data);
        return $users;
    }

    public function deleteUser($id){
        $users = DB::table($this->table)->where('id',$id)->delete();
        return $users;
    }

    public function phone(){
        return $this->hasOne(
            PhoneModel::class,
            'user_id',
            'id'
        );
    }
}
