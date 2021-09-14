<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'address'=> 'required|max:255',
            'password' => 'min:6 | max:255',
            'password_confirmation' => 'required_with:password|same:password|min:6|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:15',
        ];
    }
    public function messages() {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được vượt quá 225 ký tự',
            'min' => ':attribute ít nhất 6 ký tự',
            'email.email' => 'Sai định dạng email',
            'email.unique' => 'Email đã tồn tại',
            "password_confirmation.same"=>  __('user-vi.password_confirmation').' không đúng'
        ];
    }

    public function attributes() {
        return [
            'name' => __('user-vi.name'),
            'email' => __('user-vi.email'),
            'password' => __('user-vi.password'),
            'address' => __('user-vi.address'),
            'password_confirmation' => __('user-vi.password_confirmation'),
            'phone' => __('user-vi.phone'),
        ];
    }
}
