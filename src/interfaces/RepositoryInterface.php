<?php

namespace App\interfaces;

interface RepositoryInterface
{
    public function find($id);
    public function findAll();
    public function save(Object $user);
    public function remove($table, Object $user);
}