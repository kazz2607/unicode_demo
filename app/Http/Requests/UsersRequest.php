<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $uniqueEmail = 'unique:users';
        if ($id = session('id')){
            $uniqueEmail = 'unique:users,email,'.$id;
        }
        return [
            'name' => 'required|min:5',
            'email' => 'required|email|'.$uniqueEmail,
            'group_id' => ['required','integer', function($attribute, $value, $fail){
                if ($value == 0){
                    $fail('Bắt buộc phải chọn nhóm');
                }
            }],
            'status' => 'required|integer'
        ];
    }

    public function messages(){
        return [ 
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'group_id.required' => 'Nhóm không được để trống',
            'group_id.integer' => 'Nhóm không hợp lệ',
            'status.required' => 'Status không được để trống',
            'status.integer' => 'Status không hợp lệ'
        ];
    }
}