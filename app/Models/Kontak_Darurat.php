<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak_Darurat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pendaftarans()
    {
        return $this->hasMany(pendaftaran::class);
    }
}
