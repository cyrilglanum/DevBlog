<?php

namespace App\interfaces;
use App\models\User;

interface UserRepositoryInterface
{
    public function find($id);
    public function findAll();
    public function save(User $user);
    public function remove($table, User $user);
}