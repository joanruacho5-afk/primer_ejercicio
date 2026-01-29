<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDulceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre_dulce'=>['required', 'string'],
            'color_dulce'=>['required', 'string'],
            'marca_dulce'=>['required', 'string']
        ];
    }

    public function message():array{
        return[
            'nombre_dulce.required'=>'el campo de nombre es necesario que sea llenado',
            'color_dulce.required'=>'el campo de color es necesario que sea llenado',
            'marca_dulce.required'=>'el campo de marca es necesario que sea llenado'
        ];
    }
}
