<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model baca-saja untuk tabel mapel (hanya untuk verifikasi koneksi database).
 * Tidak ada FK langsung dari users ke mapel, sehingga primary key & kolom
 * di sini TIDAK diasumsikan.
 *
 * NEEDS DECISION: struktur kolom tabel "mapel" tidak dijabarkan di task ini.
 * Domain pemilik data mapel silakan melengkapi $fillable / kolom sesuai kebutuhan.
 */
class Mapel extends Model
{
    protected $table = 'mapel';
    public $timestamps = false;
    protected $guarded = ['*'];
}
