<?php

namespace App\Repository;

use App\Models\Tiket;

class TiketRepository implements TiketRepositoryInterface
{
    public function create (array $data)
    {
        $data['price'] = $this->calculatePrice($data['type']);
        return Tiket::create($data);
    }

    public function getAll()
    {
        return Tiket::with('film')->get();
    }

    private function calculatePrice($type)
    {
        return $type === 'Regular' ? 25000 : 45000;
    }
}