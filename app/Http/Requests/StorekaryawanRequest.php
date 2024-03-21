<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorekaryawanRequest extends FormRequest
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
            'nip' => ['required','string'],
            'nik' => ['required','string'],
            'nama' => ['required','string'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'tempat_lahir'=> ['required', 'string'],
            'tanggal_lahir' => ['required'],
            'telepon' => ['required'],
            'agama'=> ['required', 'string'],
            'status_nikah' => ['required', 'in:belum nikah,nikahh'],
            'alamat' => ['required', 'string'],
            'foto' => ['required', 'image']
         ];
    }
    public function messages()
    {
        return[
        'nip.required' => 'Data NIP belum diisi!',
        'nik.required'=>'Data NIK belum diisi!',
        'nama.required'=>'Data Nama belum diisi',
        'jenis_kelamin.required'=>'Jenis Kelamin belum diisi!',
        'tempat_lahir.required'=>'Tempat Lahir belum diisi',
        'tanggal_lahir.required'=>'Tanggal Lahir belum diisi',
        'telepon.required'=>'No Telepon belum diisi',
        'agama.required'=>'Agama belum diisi',
        'status_nikah.required'=>'Status Nikah belum diisi',
        'alamat.required'=>'Alamat belum diisi',
        'foto.required'=>'Foto belum diisi',
        ];
    }
}
