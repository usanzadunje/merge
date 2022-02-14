<?php

namespace Usanzadunje\Playground\Builder;

interface QueryBuilder
{
    public function select(array $columns, string $table): QueryBuilder;

    public function where(string $field, string $value, $operator = '='): QueryBuilder;

    public function limit(int $start, int $offset): QueryBuilder;

    public function getQuery(): string;
}