<?php

namespace Usanzadunje\app\Models;

use Usanzadunje\Database\Model;

class Post extends Model
{
    protected string $title;

    protected array $attributes = [
        'title',
    ];

    protected string $table = 'posts';

    public function getTitle()
    {
        return $this->title;
    }
}