<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = ['lmb_siswa', 'nis','nama','email', 'foto'];

    protected $appends = [
        'foto_path',
    ];

    public function fotoPath() : Attribute
    {
        return new Attribute(
            get: fn() => asset('storage/siswa/'. $this->foto),
        );
    }
}
