<?php

namespace App\Services;

class TicketPriceCalculator implements TicketPriceCalculatorInterface
{
    public function calculate(string $type): int
    {
        return match ($type) {
            'Regular' => 25000,
            'VIP' => 45000,
            'Premium' => 60000,
            default => 30000, // Harga default jika tipe tidak dikenali
        };
    }
}
