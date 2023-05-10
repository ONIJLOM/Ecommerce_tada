<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotaIngresoRequest extends FormRequest
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
            'nro' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'cantidad' => 'required',
            'costoProd' => 'required',
            'total' => 'required',
            'id_Emp' => 'required',
            'id_Prod' => 'required'
        ];
    }
}
