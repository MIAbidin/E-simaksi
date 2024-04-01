<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendaki()
    {
        return $this->belongsTo(Pendaki::class);
    }

    public function trail()
    {
        return $this->belongsTo(Trail::class);
    }
}
