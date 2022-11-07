<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditarNegocioRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'nombre' => 'required',
            'acerca_de' => 'required',
            'telefono' => 'required|digits:10',
            'foto' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'id.required' => 'El ID es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',
            'telefono.digits' => 'El campo teléfono debe contener 10 caracteres',
            'nombre.required' => 'El campo nombre es obligatorio',
            'acerca_de.required' => 'El campo acerca de es obligatorio',
            'foto.required' => 'El campo foto es obligatorio',
        ];
    }
}
