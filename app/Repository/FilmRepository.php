<?php

namespace App\Repository;

use App\Models\Film;

class FilmRepository implements FilmRepositoryInterface
{
    public function getAll()
    {
        return Film::all();
    }

    public function create(array $data)
    {
        return Film::create($data); 
    }

    public function findById($id)
    {
        return Film::findOrFail($id); 
    }

    public function update($id, array $data)
    {
        return Film::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return Film::destroy($id);
    }
}