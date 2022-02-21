<?php

namespace Usanzadunje\Playground\Iterator;

use Exception;
use IteratorAggregate;
use Traversable;

class WordCollection implements IteratorAggregate
{
    private $items;

    public function getItems()
    {
        return $this->items;
    }

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function count()
    {
        return count($this->items);
    }

    /**
     * Retrieve an external iterator
     * @link https://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable|TValue[] An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @throws Exception on failure.
     */
    public function getIterator()
    {
        return new WordIterator($this);
    }

    public function getReverseIterator()
    {
        return new WordIterator($this, true);
    }
}