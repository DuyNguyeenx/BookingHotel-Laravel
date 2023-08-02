<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
        switch ($this->method()):
            case 'POST':
                switch ($currentAction):
                    case 'create':
                        $rules = [
                            'name' => 'required',
                            'content' => 'required',
                            'start_date' => 'required',
                            'end_date' => 'required',
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            'name' => 'required',
                            'content' => 'required',
                            'start_date' => 'required',
                            'end_date' => 'required',
                        ];
                        break;
                endswitch;
                break;
        endswitch;
        return $rules;
    }

    public function messages(){
        return [
            'name.required' => 'Không được để trống!',
            'content.required' => 'Không được để trống!',
            'start_date.required' => 'Không được để trống!',
            'end_date.required' => 'Không được để trống!',
        ];
    }
}
