<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()) :
            case 'POST' :
                switch ($currentAction):
                    case 'create':
                        //xây dựng rules validate trong này
                        $rules = [

                            'image'=>'required|image|mimes:jpeg,jpg,png,webp|max:5120',
                            //5120 kb <=> 5mb
                        ];
                    break;
                    case 'edit':
                        //xây dựng rules validate trong này
                        $rules = [

                            'image'=>'required|image|mimes:jpeg,jpg,png,webp|max:5120',
                            //5120 kb <=> 5mb
                        ];
                    break;
                endswitch;
                break;
        endswitch;
        return $rules;
    }

    public function messages(){
        return[
            'image.required' => 'image phai upload len',
            'image' => 'image phai la dinh dang jpeg,jpg,png',
        ];
    }
}
