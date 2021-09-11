<?php

namespace App\Http\Requests\Client;

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
            'name'=>'string|required|max:250',
            'ci'=>'string|required|unique:clients,ci,'.$this->route('client')->id.'|min:8|max:8',
            'nit'=>'nullable|string|unique:clients,nit,'.$this->route('client')->id.'|min:11|max:12',
            'address'=>'nullable|string|max:255',
            'phone'=>'string|nullable|unique:clients,phone,'.$this->route('client')->id.'|min:8|max:12',
            'email'=>'string|nullable|unique:clients,email,'.$this->route('client')->id.'|max:255|email:rfc,dns',
        ];
    }

    public function messages()
    {
        return [

            'name.string'=>'El valor no es correcto',
            'name.required'=>'Este campo es requerido',
            'name.max'=>'Solo se permite 250 caracteres', 

            'ci.string'=>'El valor no es correcto',
            'ci.required'=>'Este campo es requerido',
            'ci.unique'=>'Este CI ya se encuentra registrado',
            'ci.max'=>'Solo se permite 8 caracteres', 
            'ci.min'=>'Se requiere de 8 caracteres', 

            'nit.string'=>'El valor no es correcto',
            'nit.unique'=>'Este NIT ya se encuentra registrado',
            'nit.max'=>'Solo se permite 12 caracteres', 
            'nit.min'=>'Se requiere de 11 caracteres', 

            'address.string'=>'El valor no es correcto',
            'address.max'=>'Solo se permite 250 caracteres',

            'phone.string'=>'El valor no es correcto',
            'phone.unique'=>'El número de celular ya se encuentra registrado',
            'phone.max'=>'Solo se permite 12 caracteres', 
            'phone.min'=>'Se requiere de 8 caracteres', 

            'email.string'=>'El valor no es correcto',
            'email.unique'=>'La dirección de correo electrónico ya se encuentra registrado',
            'email.max'=>'Solo se permite 255 caracteres', 
            'email.email'=>'No es un correo electrónico', 
        ];
    
    }
}
