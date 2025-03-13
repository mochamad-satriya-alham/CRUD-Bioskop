<?php

namespace App\Repository;

use App\Models\Film;

class FilmRepository implements FilmRepositoryInterface
{
    public function getAll()
    {
        return Film::all();
    }

    public function findById($id)
    {
        return Film::findOrFail($id);
    }
}