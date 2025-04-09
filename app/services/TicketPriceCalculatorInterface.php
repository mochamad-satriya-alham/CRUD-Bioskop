<?php

namespace App\Services;

interface TicketPriceCalculatorInterface
{
    public function calculate(string $type): int;
}
