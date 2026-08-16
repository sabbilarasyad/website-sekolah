<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model baca-saja untuk tabel nilai (hanya untuk verifikasi koneksi database).
 *
 * NEEDS DECISION: struktur kolom tabel "nilai" (FK ke murid/guru/mapel, dsb.)
 * tidak dijabarkan di task ini. Domain pemilik data nilai silakan melengkapi.
 */
class Nilai extends Model
{
    protected $table = 'nilai';
    public $timestamps = false;
    protected $guarded = ['*'];
}
