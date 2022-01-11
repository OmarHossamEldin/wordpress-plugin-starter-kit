<?php

namespace Wordpress\Database\Initialization;

use Wordpress\Database\Initialization\Connection;

class Schema 
{
    public static function create($table, $engine = 'ENGINE=InnoDB COLLATE utf8_general_ci')
    {
        $tableName = $table->getTableName();
        $columns = $table->columnsToString();
        $query = <<<QUERY
            CREATE TABLE IF NOT EXISTS $tableName 
                ($columns) $engine
        QUERY;
        $connection = new Connection;
        try {
            $connection->getDb()->query($query);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function dropIfExistsdrop(String $tableName)
    {
        $connection = new Connection;
        $connection->getDb()->query("DROP TABLE IF EXISTS $tableName");
    }
}
