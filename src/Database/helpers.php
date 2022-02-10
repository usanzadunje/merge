<?php

if (!function_exists('sanitize_sql_column')) {

    function sanitize_sql_column(string $column): string
    {
        $replaced = str_replace('"', '', $column);
        $replaced = str_replace('`', '', $replaced);
        $replaced = str_replace("'", '', $replaced);
        $column = str_replace(" ", '', $replaced);

        return "`$column`";
    }
}