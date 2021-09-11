<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'=>'required|string|max:255',

            'email'=>'required|email|string|unique:providers,email,'.
             $this->route('provider')->id.'|max:255',

            'nit_number'=>'required|string|min:11|unique:providers,nit_number,'.
            $this->route('provider')->id.'|max:12',

            'address'=>'nullable|string|max:255',

            'phone'=>'required|string|min:8|unique:providers,phone,'.
            $this->route('provider')->id.'|max:12',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se permite 50 caracteres',

            'email.required'=>'Este campo es requerido',
            'email.email'=>'No es un correo electrónico',
            'email.string'=>'El valor no es correcto',
            'email.max'=>'Solo se permiten 255 caracteres',
            'email.unique'=>'Ya se encuentra registrado',
            
            'nit_number.required'=>'Este campo es requerido',
            'nit_number.string'=>'El valor no es correcto',
            'nit_number.max'=>'Solo se permiten 12 caracteres',
            'nit_number.min'=>'Se requiere de 11 caracteres',
            'nit_number.unique'=>'Ya se encuentra registrado',

            'address.string'=>'El valor no es correcto',
            'address.max'=>'Solo se permite 250 caracteres',

            'phone.required'=>'Este campo es requerido',
            'phone.string'=>'El valor no es correcto',
            'phone.max'=>'Solo se permiten 12 caracteres',
            'phone.min'=>'Se requiere de 8 caracteres',
            'phone.unique'=>'Ya se encuentra registrado',
        ];
    }
}
