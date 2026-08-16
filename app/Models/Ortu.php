<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model baca-saja untuk tabel ortu (verifikasi koneksi & relasi ke users).
 * CRUD data ortu adalah tanggung jawab domain lain.
 *
 * NEEDS DECISION: primary key diasumsikan "N_KK" (mengikuti FK users.n_kk -> ortu.N_KK).
 */
class Ortu extends Model
{
    protected $table = 'ortu';
    protected $primaryKey = 'N_KK';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = ['*'];

    public function user()
    {
        return $this->hasOne(User::class, 'n_kk', 'N_KK');
    }
}
