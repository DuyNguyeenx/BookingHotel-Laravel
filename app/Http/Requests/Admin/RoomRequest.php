<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];
        //lấy ra tên phương thức cần xử lý
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()) :
            case 'POST' :
                switch ($currentAction):
                    case 'create':
                        //xây dựng rules validate trong này
                        $rules = [
                            'name'=>'required',
                            'image'=>'required|image|mimes:jpeg,jpg,png,webp|max:5120',
                            'description'=>'required',
                            'price'=>'required', //5120 kb <=> 5mb
                        ];
                    break;
                    case 'edit':
                        //xây dựng rules validate trong này
                        $rules = [
                            'name'=>'required',
                            'image'=>'required|image|mimes:jpeg,jpg,png,webp|max:5120',
                            'description'=>'required',
                            'price'=>'required', //5120 kb <=> 5mb
                        ];
                    break;
                endswitch;
                break;
        endswitch;
        return $rules;
    }

    public function messages(){
        return[
            'name.required'=>'ten kh duoc de trong',
            'description.required'=>'mo ta kh dc de trong',
            'price.required' =>'gia khong duoc de trong',
            'image.required' => 'image phai upload len',
        ];
    }
}
