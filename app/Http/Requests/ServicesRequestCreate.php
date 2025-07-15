<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequestCreate extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'code' => ['required', 'unique:services,code', 'string', 'max:255'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'nama tidak boleh kosong',
            'code.required' => 'code tidak boleh kosong',
            'code.unique' => 'code sudah digunakan',
        ];
    }
}
