<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // sudah dibatasi lewat middleware auth di route
    }

    public function rules(): array
    {
        // id diambil dari route parameter saat update, agar unique() mengabaikan data sendiri
        $mahasiswaId = $this->route('mahasiswa')?->id;

        return [
            'nim' => ['required', 'string', 'max:20', Rule::unique('mahasiswas', 'nim')->ignore($mahasiswaId)],
            'nama' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:today'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'alamat' => ['required', 'string'],
            'program_studi' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:15', 'regex:/^[0-9+\-\s]+$/'],
            'email' => ['required', 'email', 'max:255', Rule::unique('mahasiswas', 'email')->ignore($mahasiswaId)],
        ];
    }

    public function messages(): array
    {
        return [
            'nim.unique' => 'NIM sudah terdaftar.',
            'email.unique' => 'Email sudah terdaftar.',
            'tanggal_lahir.before' => 'Tanggal lahir harus sebelum hari ini.',
        ];
    }
}