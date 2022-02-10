<?php

namespace Usanzadunje\Models;

use Usanzadunje\Database\Model;

class User extends Model
{
    protected string $name;
    protected string $email;

    protected array $attributes = [
        'name',
        'description',
        'password',
    ];

    protected string $table = 'users';

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }
}