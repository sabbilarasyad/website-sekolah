<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model tabel mapel — dilengkapi oleh Domain B (Academic/Guru) sesuai
 * struktur database sebenarnya (lihat schema sekolah.sql):
 *
 *   kode_mapel (PK, varchar), nama_mapel, kkm (int, default 75),
 *   nip (FK -> guru.nip, ON DELETE SET NULL)
 *
 * Bersifat read-only untuk kebutuhan Domain B (tidak ada requirement CRUD
 * mapel di Domain B) — tetap $guarded = ['*'] agar tidak bisa mass-assign.
 */
class Mapel extends Model
{
    protected $table = 'mapel';
    protected $primaryKey = 'kode_mapel';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $guarded = ['*'];

    /**
     * Guru pengampu mata pelajaran ini.
     */
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'nip', 'nip');
    }

    /**
     * Nilai-nilai yang tercatat untuk mapel ini.
     */
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'kode_mapel', 'kode_mapel');
    }
}
