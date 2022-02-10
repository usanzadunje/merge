<?php

namespace Usanzadunje\Models;

use Usanzadunje\Database\Model;

class Product extends Model
{
    protected string $name;
    protected ?string $description;

    protected array $attributes = [
        'name',
        'description',
    ];

    protected string $table = 'products';

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }
}