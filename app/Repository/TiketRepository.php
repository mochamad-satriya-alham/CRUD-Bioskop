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

    public function findById($id)
    {
        return Tiket::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $tiket = Tiket::findOrFail($id);

        if (isset($data['type'])) {
            $data['price'] = $this->calculatePrice($data['type']);
        }

        $tiket->update($data);
        return $tiket;
    }

    public function delete($id)
    {
        return Tiket::destroy($id);
    }

    private function calculatePrice($type)
    {
        return $type === 'Regular' ? 25000 : 45000;
    }
}