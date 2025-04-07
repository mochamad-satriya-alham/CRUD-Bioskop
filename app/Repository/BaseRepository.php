<?php
namespace App\Repository;


interface BaseRepository
{
    public function create(array $data);
    public function getAll();
    public function findById($id);
    public function update($id, array $data);
    public function delete($id);
}