<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model baca-saja untuk database VIEW "data_siswa_ortu".
 * Views tidak bisa di-insert/update/delete lewat Eloquent secara aman,
 * jadi model ini murni untuk query SELECT (mis. dashboard ortu/siswa).
 *
 * NEEDS DECISION: kolom & primary key view ini belum dijabarkan di task —
 * silakan dilengkapi oleh domain yang memakainya (kemungkinan Domain D/E).
 */
class DataSiswaOrtu extends Model
{
    protected $table = 'data_siswa_ortu';
    public $timestamps = false;
    public $incrementing = false;
    protected $guarded = ['*'];
}
