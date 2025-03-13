<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['Nama_film'];

    public function tikets()
    {
        return $this->hasMany(Tiket::class, 'film_id');
    }
}
