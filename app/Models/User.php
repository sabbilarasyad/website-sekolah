<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Model users - dasar autentikasi & role-based access.
 *
 * Kolom: id, username, password (hash bcrypt), role (enum: admin, guru, siswa, ortu),
 * nama_lengkap, nip, nisn, n_kk, is_active, created_at, updated_at.
 *
 * FK (ON DELETE SET NULL):
 *  - nip  -> guru.nip
 *  - nisn -> murid.NISN
 *  - n_kk -> ortu.N_KK
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'password',
        'role',
        'nama_lengkap',
        'nip',
        'nisn',
        'n_kk',
        'is_active',
    ];

    /**
     * PENTING: password & remember_token TIDAK BOLEH pernah muncul di
     * response JSON, log, atau dump. Selalu hidden.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'password' => 'hashed',
        ];
    }

    // Laravel auth secara default memakai kolom "email" untuk login;
    // kita override supaya memakai "username".
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'nip', 'nip');
    }

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'nisn', 'NISN');
    }

    public function ortu()
    {
        return $this->belongsTo(Ortu::class, 'n_kk', 'N_KK');
    }

    public function isRole(string $role): bool
    {
        return $this->role === $role;
    }
}
