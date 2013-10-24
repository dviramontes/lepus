<?php

namespace Lepus\Interfaces;

interface UserRepositoryInterface
{

    public function findByUsername($username);

}