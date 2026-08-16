<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model baca-saja untuk tabel murid (verifikasi koneksi & relasi ke users).
 * CRUD data murid adalah tanggung jawab domain lain.
 *
 * NEEDS DECISION: primary key diasumsikan "NISN" (mengikuti FK users.nisn -> murid.NISN).
 */
class Murid extends Model
{
    protected $table = 'murid';
    protected $primaryKey = 'NISN';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = ['*'];

    public function user()
    {
        return $this->hasOne(User::class, 'nisn', 'NISN');
    }
}
