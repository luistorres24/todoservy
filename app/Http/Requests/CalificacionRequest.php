<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalificacionRequest extends FormRequest
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
            'id_negocio' => 'required',
            'nombre' => 'required',
            'comentario' => 'required',
            'calificacion' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'id_negocio.required' => 'Debe enviar el campo ID de negocio',
            'nombre.required' => 'El campo nombre es obligatorio',
            'comentario.required' => 'El campo comentario es obligatorio',
            'calificacion.required' => 'El campo calificacion es obligatorio',
        ];
    }
}
