<?php

namespace App\Repository;

interface TiketRepositoryInterface
{
    public function create(array $data);
    public function getAll();
}