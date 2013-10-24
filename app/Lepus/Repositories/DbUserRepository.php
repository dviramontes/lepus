<?php

namespace Lepus\Repositories;

use User;
use Lepus\Interfaces\UserRepositoryInterface;

class DbUserRepository implements UserRepositoryInterface {

    protected $filterable = array('username');

    public function findByUsername($username)
    {
        return User::where('username', '=', $username)->toArray();
    }

}