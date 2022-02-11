<?php

namespace Usanzadunje\Database;

use PDO;
use PDOException;
use PDOStatement;

class Model
{
    private PDO $connection;

    protected string $primaryKey = 'id';

    protected int $id;

    protected array $attributes;

    protected string $table;

    private string $query = '';

    public $bindings = [
        'select' => [],
        'from' => [],
        'join' => [],
        'where' => [],
    ];

    public function __construct()
    {
        // Retrieving PDO connection instance to our DB.
        $this->connection = Connection::get();
    }

    /**
     * Returns table identified for current model.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Builds query for SELECT statement by the columns provided.
     *
     * @param array $columns
     * @return $this
     */
    public function select(array $columns): Model
    {
        $columns = $this->prepareColumnsForQuery($columns);

        $this->query = "SELECT $columns FROM $this->table";

        return $this;
    }

    /**
     * Sanitizes and prepares columns for raw SQL query.
     *
     * @param array $columns
     * @return string
     */
    private function prepareColumnsForQuery(array $columns): string
    {
        return implode(
            ',',
            array_map(
                fn($el) => sanitize_sql_column($el),
                $columns
            )
        );
    }

    /**
     * Sanitizes and prepares columns for raw SQL query.
     *
     * @param int $length
     * @return string
     */
    private function prepareParamsForQuery(int $length): string
    {
        return implode(
            ',',
            array_fill(0, $length, '?')
        );
    }

    /**
     * Adds basic SQL WHERE clause.
     *
     * @param string $column
     * @param mixed $value
     * @param string $operator
     * @param string|null $boolean
     * @return $this
     */
    public function where(string $column, mixed $value, string $operator = '=', string $boolean = null): Model
    {
        if (empty($this->query)) {
            $this->query = "SELECT * FROM $this->table";
        }

        $column = sanitize_sql_column($column);
        $withBoolean = $boolean ?: 'WHERE';

        $where = " $withBoolean $column $operator ?";

        $this->query .= $where;

        $this->bindings['where'][] = $value;

        return $this;
    }

    /**
     * Executes prepared statement.
     *
     * @param null $bindings
     * @return PDOStatement
     */
    private function executeStatement($bindings = null): PDOStatement
    {
        if (empty($this->query)) {
            $this->query = "SELECT * FROM $this->table";
        }

        $statement = $this->connection->prepare($this->query);
        $statement->execute($bindings);

        return $statement;
    }

    /**
     * Executes PDO prepared statement for defined query and returns array of model instances.
     *
     * @return array|bool
     */
    public function get(): array|bool
    {
        try {
            $statement = $this->executeStatement($this->bindings['where']);

            return $this->generateModelsArray($statement->fetchAll());
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();

            return false;
        }
    }

    /**
     * Generates model array from SQL query results
     *
     * @param $queryResults
     * @return array|bool
     */
    private function generateModelsArray($queryResults): array|bool
    {
        if (!$queryResults) {
            return false;
        }

        $models = [];

        foreach ($queryResults as $result) {
            $models[] = $this->generateModel($result);
        }

        return $models;
    }

    /**
     * Executes PDO prepared statement for defined query and return single model instance.
     *
     * @return Model|bool
     */
    public function first(): Model|bool
    {
        try {
            $statement = $this->executeStatement($this->bindings['where']);

            return $this->generateModel($statement->fetch());
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();

            return false;
        }
    }

    /**
     * Generates single model from SQL query result
     *
     * @param $queryResult
     * @return Model|bool
     */
    private function generateModel($queryResult): Model|bool
    {
        if (!$queryResult) {
            return false;
        }

        $model = new $this();

        foreach (get_object_vars($queryResult) as $key => $value) {
            $model->{$key} = $value;
        }

        return $model;
    }

    /**
     * Inserts record into database.
     *
     * @param array $values
     * @return int|bool
     */
    public function insert(array $values): int|bool
    {
        $columns = $this->prepareColumnsForQuery($this->attributes);
        $valueParams = $this->prepareParamsForQuery(count($this->attributes));

        $this->query = "INSERT INTO $this->table($columns) VALUES($valueParams)";

        $bindings = [];

        foreach ($this->attributes as $attr) {
            $bindings[] = $values[$attr];
        }

        try {
            $this->executeStatement($bindings);

            return $this->connection->lastInsertId();
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();

            return false;
        }
    }

    /**
     * Updates record from database.
     *
     * @param array $values
     * @return int|bool
     */
    public function update(array $values): int|bool
    {
        $updateArray = [];
        foreach ($values as $key => $value) {
            $key = sanitize_sql_column($key);

            $updateArray[] = "$key=?";
        }

        $update = implode(',', $updateArray);

        $this->query = "UPDATE $this->table SET $update WHERE $this->primaryKey = $this->id";

        try {
            $this->executeStatement(array_values($values));

            return true;
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();

            return false;
        }
    }

    /**
     * Deletes current model from database.
     *
     * @return bool
     */
    public function delete(): bool
    {
        $this->query = "DELETE FROM $this->table WHERE $this->primaryKey = $this->id";

        try {
            $this->executeStatement();

            return true;
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();

            return false;
        }
    }
}