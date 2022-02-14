<?php

use Usanzadunje\Playground\Builder\MysqlQueryBuilder;
use Usanzadunje\Playground\Builder\PostgressQueryBuilder;
use Usanzadunje\Playground\Builder\QueryBuilder;

require '../../vendor/autoload.php';

function execute(QueryBuilder $builder)
{
    echo $builder
        ->select(['id', 'name'], 'users')
        ->where('id', 23)
        ->where('id', 10)
        ->limit(5, 10)
        ->getQuery();
}

execute(new MysqlQueryBuilder());
echo "<br/>";
execute(new PostgressQueryBuilder());
