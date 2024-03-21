<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
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
            // 'tanggal' => ['required'],
            // 'total_harga' => ['required'],
            // 'metode_pembayaran' => ['required','string'],
            // 'deskripsi' => ['required'],
        ];
    }
    // public function messages()
    // {
    //     return[
    //     'tanggal.required' => 'Data tanggal belum diisi!',
    //     'total_harga.required'=>'Data total harga belum diisi!',
    //     'metode_pembayaran.required'=>'Data metode pembayaran belum diisi',
    //     'deskripsi.required'=>'deskripsi belum diisi!',
    //     ];
    // }
}
