<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Models\PhoneModel;
use App\Models\GroupsModel;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;

class UsersController extends Controller
{
    private $users;

    const _PER_PAGE = 3 ;

    public function __construct()
    {
        $this->users = new UsersModel();
    }

    public function index(Request $request){
        $filters =[];
        $keyword = null;
        // Filter Status
        if (!empty($request->status)){
            $status = $request->status;
            if($status == 'active'){
                $status = '1';
            }else{
                $status = '0';
            }
            $filters[] = ['users.status', '=', $status];
        }
        // Filter Groups
        if (!empty($request->group_id)){
            $groupId = $request->group_id;
            $filters[] = ['users.group_id', '=', $groupId];
        }
        // Filter Keyword
        if (!empty($request->keyword)){
            $keyword = $request->keyword;
        }
        //dd($filters);

        // Xử lý Sort 
        $sortType =  $request->sort_type;
        $sortBy = $request->sort_by;
        $allowSort = ['asc','desc'];
        if (!empty($sortType) && in_array($sortType,$allowSort)){
            if ($sortType == 'desc'){
                $sortType = 'asc';
            }else{
                $sortType = 'desc';
            }
        }else{
            $sortType = 'asc';
        }
        $sort = [
            'sort_type' => $sortType,
            'sort_by' => $sortBy
        ];

        $list = $this->users->getAllUsers($filters,$keyword,$sort,self::_PER_PAGE );
        // Thẻ meta
        $meta['title'] ='Danh sách thành viên';
        $meta['description'] ='Danh sách thành viên';
        $meta['image'] ='';
        // Return View 
        return view('backend.users.index',compact('meta','list','sort'));
    }

    public function create(){

        $groups = getAllGroup();
        // Thẻ meta
        $meta['title'] ='Thêm thành viên';
        $meta['description'] ='Mô tả thêm thành viên';
        $meta['image'] ='';
        // Return View 
        return view('backend.users.create',compact('meta','groups'));
    }

    public function store(UsersRequest $request){
        $data =[
            'name' => $request->name,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'create_at' => date('Y-m-d H:i:s')
        ];
        $this->users->addUser($data);
        return redirect()->route('users.index')->with('msg','Thêm thành viên thành công');
    }

    public function edit(Request $request, $id){
        $user = $this->users->getDetailUsers($id);
        $request->session()->put('id',$id);
        $groups = getAllGroup();
        // Thẻ meta
        $meta['title'] ='Chỉnh sửa thành viên';
        $meta['description'] ='Mô tả chỉnh sửa thành viên';
        $meta['image'] ='';
        // Return View 
        return view('backend.users.edit',compact('meta','user','groups'));
    }

    public function update(UsersRequest $request){
        $id = session('id');
        if (empty($id)){
            return back()->with('msg','Thành viên này không tồn tại');
        }
        $data =[
            'name' => $request->name,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'update_at' => date('Y-m-d H:i:s')
        ];
        $this->users->updateUser($id,$data);
        return redirect()->route('users.index')->with('msg','Chỉnh sửa thành viên thành công');
    }

    public function delete($id){
        $this->users->deleteUser($id);
        return redirect()->route('users.index')->with('msg','Xoá thành viên thành công');
    }

    public function relations(){
        // $user = UsersModel::find(6)->phone;
        // $idPhone = $user->id;
        // $phoneNumber = $user->phone;
        // echo 'ID phone : '.$idPhone.'</br>';
        // echo 'Phone Number : '.$phoneNumber.'</br>';

        // $user = PhoneModel::where('phone','0907701772')->first()->user;
        // $fullName = $user->name;
        // $email = $user->email;
        // echo 'Tên : '.$fullName.'</br>';
        // echo 'Email : '.$email.'</br>';

        //$user = GroupsModel::find(1)->users;
        // $user = GroupsModel::find(1)->users()->where('email','info@webvina.net')->get();
        // if ($user->count()>0){
        //     foreach ($user as $item){
        //         Echo $item->name.'</br>';
        //     }
        // }

        $group = UsersModel::find(6)->group;
        $groupName =  $group->name;
        echo 'Tên nhóm của user : '.$groupName;
    }
}
