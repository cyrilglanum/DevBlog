<?php

namespace App\interfaces;

interface RepositoryInterface
{
    public function find($id);
    public function findAll();
    public function remove($table, Object $object);
}