<?php

namespace App\Repository;

use App\Models\Tiket;

class TiketRepository implements TiketRepositoryInterface
{
    public function create (array $data)
    {
        return Tiket::create($data);
    }
}