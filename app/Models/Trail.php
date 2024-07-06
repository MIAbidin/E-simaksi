<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trail extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'harga_tiket',
    ];

    public function pendaftarans()
    {
        return $this->hasMany(pendaftaran::class);
    }
}
