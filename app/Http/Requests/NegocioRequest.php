<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NegocioRequest extends FormRequest
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
            'nombre' => 'required',
            'acerca_de' => 'required',
            'telefono' => 'required|min:10',
            'foto' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'telefono.required' => 'El teléfono es obligatorio',
            'telefono.min' => 'El campo teléfono debe contener al menos 10 caracteres',
            'nombre.required' => 'El campo nombre es obligatorio',
            'acerca_de.required' => 'El campo acerca de es obligatorio',
            'foto.required' => 'El campo foto es obligatorio',
        ];
    }
}
