<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePemesananRequest extends FormRequest
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
            'meja_id' => ['required', 'string'],
            'tanggal_pemesanan' => ['required'],
            'jam_mulai' => ['required'],
            'jam_selesai' => ['required'],
            'nama_pemesan'=> ['required', 'string'],
            'jumlah_pelanggan' => ['required'],
         ];
    }
    public function messages()
    {
        return[
        'meja_id.required' => 'Data Meja belum diisi!',
        'tanggal_pemesanan.required'=>'Data tanggal Pemesanan belum diisi!',
        'jam_mulai.required'=>'Data jam Mulai belum diisi',
        'jam_selesai.required'=>'Jam Selesai belum diisi!',
        'nama_pemesan.required'=>'Nama Pemesan belum diisi',
        'jumlah_pelanggan.required'=>'Jumlah pelanggan belum diisi',
        ];
    }
}
