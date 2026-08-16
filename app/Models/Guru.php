<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model baca-saja untuk tabel guru (verifikasi koneksi & relasi ke users).
 * CRUD penuh untuk data guru adalah tanggung jawab domain lain — model ini
 * TIDAK menambahkan mass-assignment/write logic apa pun.
 *
 * NEEDS DECISION: primary key diasumsikan "nip" (mengikuti FK users.nip -> guru.nip).
 * Kolom lain di luar "nip" belum diverifikasi strukturnya di sini — silakan
 * dilengkapi oleh domain yang bertanggung jawab atas data guru.
 */
class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = ['*']; // read-only: tidak boleh mass-assign dari model ini

    public function user()
    {
        return $this->hasOne(User::class, 'nip', 'nip');
    }
}
