<?php

namespace App\Repository;

use App\Models\Film;

interface FilmRepositoryInterface
{
    public function create(array $data);
    public function findById($id);

}