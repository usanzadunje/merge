<?php

namespace Usanzadunje\Playground\Builder;

class PostgressQueryBuilder extends MysqlQueryBuilder
{
    public function limit(int $start, int $offset): QueryBuilder
    {
        $this->query->limit = " LIMIT $start OFFSET $offset";

        return $this;
    }
}