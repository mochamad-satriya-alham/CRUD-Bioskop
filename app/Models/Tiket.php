<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $fillable = ['film_id', 'studio', 'showtime', 'type', 'price', 'quantity'];

    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }

}