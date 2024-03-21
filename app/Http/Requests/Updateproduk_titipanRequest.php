<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updateproduk_titipanRequest extends FormRequest
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
            'nama_produk' => 'required|string',
            'nama_supplier' => 'required',
            'harga_beli' => 'required',
            'harga_jual'=> 'required',
            'stok'=> 'required|string',
            'keterangan' => 'required',
        ];
    }
}
