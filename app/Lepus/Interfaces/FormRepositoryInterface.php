<?php

namespace Lepus\Interfaces;

interface FormRepositoryInterface {

    public function find($id);
    public function findByName($name);
    public function getAll($filters);

}