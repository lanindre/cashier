<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'harga' => ['required'],
            // 'image' => ['required', 'string'],
            'deskripsi'=> ['required', 'string'],
            'jenis_id' => ['required','string']
         ];
    }
    public function messages()
    {
        return[
        'name.required' => 'Data name belum diisi!',
        'harga.required'=>'Data Harga belum diisi!',
        // 'image.required'=>'Data Image belum diisi',
        'deskripsi.required'=>'Deskripsi belum diisi!',
        'jenis_id.required'=>'Jenis belum diisi'
        ];
    }
}
