<?php

namespace App\Http\Requests\Academic;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNilaiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nisn' => ['required', 'string', 'exists:murid,NISN'],
            'kode_mapel' => ['required', 'string', 'exists:mapel,kode_mapel'],
            'semester' => ['required', Rule::in(['Ganjil', 'Genap'])],
            'tahun_ajaran' => ['required', 'string', 'regex:/^\d{4}\/\d{4}$/'],
            'nilai_tugas' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'nilai_uh' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'nilai_uts' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'nilai_uas' => ['nullable', 'numeric', 'min:0', 'max:100'],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->isNotEmpty()) {
                return;
            }

            $exists = \App\Models\Nilai::query()
                ->where('nisn', $this->input('nisn'))
                ->where('kode_mapel', $this->input('kode_mapel'))
                ->where('semester', $this->input('semester'))
                ->where('tahun_ajaran', $this->input('tahun_ajaran'))
                ->exists();

            if ($exists) {
                $validator->errors()->add(
                    'nisn',
                    'Nilai untuk siswa ini pada mata pelajaran, semester, dan tahun ajaran tersebut sudah pernah diinput.'
                );
            }
        });
    }

    public function messages(): array
    {
        return [
            'nisn.required' => 'Siswa wajib dipilih.',
            'nisn.string' => 'Data siswa tidak valid.',
            'nisn.exists' => 'Siswa yang dipilih tidak ditemukan di data siswa.',
            'kode_mapel.required' => 'Mata pelajaran wajib dipilih.',
            'kode_mapel.string' => 'Data mata pelajaran tidak valid.',
            'kode_mapel.exists' => 'Mata pelajaran yang dipilih tidak ditemukan.',
            'semester.required' => 'Semester wajib dipilih.',
            'semester.in' => 'Semester harus Ganjil atau Genap.',
            'tahun_ajaran.required' => 'Tahun ajaran wajib diisi.',
            'tahun_ajaran.string' => 'Tahun ajaran tidak valid.',
            'tahun_ajaran.regex' => 'Format tahun ajaran harus YYYY/YYYY, contoh: 2025/2026.',
            'nilai_tugas.numeric' => 'Nilai Tugas harus berupa angka.',
            'nilai_tugas.min' => 'Nilai Tugas tidak boleh kurang dari 0.',
            'nilai_tugas.max' => 'Nilai Tugas maksimal 100.',
            'nilai_uh.numeric' => 'Nilai UH harus berupa angka.',
            'nilai_uh.min' => 'Nilai UH tidak boleh kurang dari 0.',
            'nilai_uh.max' => 'Nilai UH maksimal 100.',
            'nilai_uts.numeric' => 'Nilai UTS harus berupa angka.',
            'nilai_uts.min' => 'Nilai UTS tidak boleh kurang dari 0.',
            'nilai_uts.max' => 'Nilai UTS maksimal 100.',
            'nilai_uas.numeric' => 'Nilai UAS harus berupa angka.',
            'nilai_uas.min' => 'Nilai UAS tidak boleh kurang dari 0.',
            'nilai_uas.max' => 'Nilai UAS maksimal 100.',
        ];
    }

    public function attributes(): array
    {
        return [
            'nisn' => 'NISN',
            'kode_mapel' => 'Mata Pelajaran',
            'semester' => 'Semester',
            'tahun_ajaran' => 'Tahun Ajaran',
            'nilai_tugas' => 'Nilai Tugas',
            'nilai_uh' => 'Nilai UH',
            'nilai_uts' => 'Nilai UTS',
            'nilai_uas' => 'Nilai UAS',
        ];
    }
}
