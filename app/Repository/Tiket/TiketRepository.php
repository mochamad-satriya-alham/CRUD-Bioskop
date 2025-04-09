<?php

namespace App\Repository\Tiket;

use App\Models\Tiket;
use App\Services\TicketPriceCalculatorInterface;
use App\Repository\Tiket\TiketRepositoryInterface;

class TiketRepository implements TiketRepositoryInterface
{
    protected TicketPriceCalculatorInterface $priceCalculator;

    public function __construct(TicketPriceCalculatorInterface $priceCalculator)
    {
        $this->priceCalculator = $priceCalculator;
    }


    public function create (array $data)
    {
        $data['price'] = $this->priceCalculator->calculate($data['type']);
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
            $data['price'] = $this->priceCalculator->calculate($data['type']);
        }

        $tiket->update($data);
        return $tiket;
    }

    public function delete($id)
    {
        return Tiket::destroy($id);
    }

}