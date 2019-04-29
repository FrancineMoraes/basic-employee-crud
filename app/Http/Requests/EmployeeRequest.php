<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'phone' => 'required|max:191',
            'cep' => 'required|max:191',
            'street' => 'required|max:191',
            'number' => 'required|max:191',
            'district' => 'required|max:191',
            'city' => 'required|max:191',
            'state' => 'required|max:191',
            'path' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Nome é um campo obrigatório',
            'email.required'  => 'Email é um campo obrigatório',
            'phone.required'  => 'Telefone é um campo obrigatório',
            'cep.required'  => 'Cep é um campo obrigatório',
            'street.required'  => 'Rua é um campo obrigatório',
            'number.required'  => 'Número é um campo obrigatório',
            'district.required'  => 'Bairro é um campo obrigatório',
            'city.required'  => 'Cidade é um campo obrigatório',
            'state.required'  => 'Estado é um campo obrigatório',
            'path.required'  => 'Imagem é um campo obrigatório',
        ];
    }
}
