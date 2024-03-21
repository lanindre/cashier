<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
            'email' => ['required','string'],
            'nomor_telepon' => ['required'],
            'alamat' => ['required', 'string'],
         ];
    }
    public function messages()
    {
        return[
        'name.required' => 'Nama belum diisi!',
        'email.required'=>'Email belum diisi!',
        'nomor_telepon.required'=>'Nomor telepon belum diisi',
        'alamat.required'=>'Alamat belum diisi!',
        ];
    }
}
