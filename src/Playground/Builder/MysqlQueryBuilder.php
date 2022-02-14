<?php

namespace Usanzadunje\Playground\Builder;

class MysqlQueryBuilder implements QueryBuilder
{
    protected $query;

    public function reset()
    {
        $this->query = new \stdClass();
    }

    public function select(array $columns, string $table): QueryBuilder
    {
        $this->reset();

        $this->query->select = "SELECT " . implode(',', $columns) . " FROM $table";
        $this->query->type = 'select';

        return $this;
    }

    public function where(string $field, string $value, $operator = '='): QueryBuilder
    {
        $this->query->where[] = "$field $operator $value";

        return $this;
    }

    public function limit(int $start, int $offset): QueryBuilder
    {
        $this->query->limit = " LIMIT $start, $offset";

        return $this;
    }

    public function getQuery(): string
    {
        $sql = $this->query->select;

        if (!empty($this->query->where)) {
            $sql .= " WHERE " . implode(' AND ', $this->query->where);
        }

        if (!empty($this->query->limit)) {
            $sql .= $this->query->limit;
        }

        $sql .= ';';

        return $sql;
    }
}