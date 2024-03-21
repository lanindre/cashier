<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJenisRequest extends FormRequest
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
            'name' => ['required','string'],
            // 'kategori_id' => ['required', 'exists:kategori,id'],
         ];
    }
    public function messages()
    {
        return[
        'name.required' => 'Data name belum diisi!',
        // 'kategori_id.required'=>'Data kategori belum diisi!',
        ];
    }
    
}
