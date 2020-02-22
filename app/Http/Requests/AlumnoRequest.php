<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
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

    public function prepareForValidation(){
        if ($this->nombre!=null) {
            $this->merge([
                'nombre'=>ucwords($this->nombre)
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>['required'],
            'apellidos'=>['required'],
            'mail'=>['required', 'unique:alumnos,mail', "email:rfc,dns"],
            'logo'=>['nullable', 'image']
        ];
    }

    /**
     * Get messages of validation's failure
     *
     * @return array
     */
    public function messages(){
        return [
            'nombre.required'=>'El campo nombre es obligatorio!',
            'apellidos.required'=>'El campo apellido es obligatorio!',
            'mail.required'=>'El campo mail es obligatorio!',
            'mail.unique'=>'Este mail ya está registrado en la base de datos!',
            'logo.image'=>'El fichero debe ser de tipo imagen!', 
        ];
    }   
}
