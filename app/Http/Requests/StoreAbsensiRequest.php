<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbsensiRequest extends FormRequest
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
            'namaKaryawan' => ['required','string'],
            'tanggalMasuk' => ['required'],
            'waktuMasuk' => ['required'],
            'status' => ['required', 'in:masuk,cuti,izin'],
            // 'waktuKeluar'=> ['required']
         ];
    }
    public function messages()
    {
        return[
        'namaKaryawan.required' => 'Data  Nama Karyawan belum diisi!',
        'tanggalMasuk.required'=>'Data tanggal masuk belum diisi!',
        'waktuMasuk.required'=>'Data waktu Masuk belum diisi',
        'status.required'=>'status belum diisi!',
        // 'waktuKeluar.required'=>'waktu keluar belum diisi',
        ];
    }
}
