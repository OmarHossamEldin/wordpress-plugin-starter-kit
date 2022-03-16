<?php

namespace Wordpress\Database\Initialization;

class Schema
{
    private static function get_db_connect(): Connection
    {
        $connection = new Connection();
        return $connection;
    }

    public static function create($tableName, callable $callable, $engine = 'ENGINE=InnoDB COLLATE utf8_general_ci')
    {
        $table = new Table($tableName, $engine);
        call_user_func($callable, $table);
        $tableName = $table->get_table_name();
        $columns = $table->columns_to_string();
        $query = <<<QUERY
            CREATE TABLE IF NOT EXISTS $tableName
                ($columns) $engine
        QUERY;

        self::get_db_connect()->get_db()->query($query);
    }

    public static function dropIfExists(String $tableName)
    {
        self::get_db_connect()->get_db()->query("DROP TABLE IF EXISTS $tableName");
    }
}
