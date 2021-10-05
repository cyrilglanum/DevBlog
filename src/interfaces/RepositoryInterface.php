<?php

namespace App\interfaces;


interface RepositoryInterface
{
    public function find($id);
    public function findAll();

 /**
 * Remove an instance from a table.
 *
 * @return void
 */
    public function remove($table, Object $object);
}