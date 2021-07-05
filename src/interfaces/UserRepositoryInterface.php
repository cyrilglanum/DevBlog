<?php

namespace App\interfaces;
use App\models\User;

interface UserRepositoryInterface
{
    public function find($id);
    public function save(User $user);
    public function remove(User $user);
}