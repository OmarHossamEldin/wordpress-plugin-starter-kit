<?php

namespace Wordpress\Database\Initialization;

class Table
{
    private $columns;

    private $tableName;

    public function __construct(String $tableName)
    {
        $this->tableName = $tableName;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function columnsToString()
    {
        $string = implode(', ', $this->columns);
        return $string;
    }

    public function id($column = 'id')
    {
        $this->int($column)
            ->notNullable($column)
            ->autoIncrement($column);
    }

    public function primaryKey($column)
    {
        $this->columns[] = "PRIMARY KEY($column)";
        return $this;
    }


    public function foreignId($column)
    {
        $this->int($column)
            ->notNullable($column);
        return $this;
    }

    public function references($table, $id = 'id')
    {
        if (str_ends_with($table, 'ies')) {
            $remove = substr($table, 0, strlen($table) - 3);
            $result = $remove . 'y' . '_' . $id;
        } else if (str_ends_with($table, 's')) {
            $remove = substr($table, 0, strlen($table) - 1);
            $result = $remove . '_' . $id;
        }

        $this->columns[] = "FOREIGN KEY ($result) REFERENCES $table($id)";
        return $this;
    }

    public function int($column, $length = 11)
    {
        $this->columns[$column] = "$column INT($length)";
        return $this;
    }

    public function autoIncrement($column)
    {
        $this->columns[$column] .= ' AUTO_INCREMENT';
        return $this;
    }

    public function notNullable($column)
    {
        $this->columns[$column] .= ' NOT NULL';
        return $this;
    }

    public function nullable($column)
    {
        $this->columns[$column] .= ' NULL';
        return $this;
    }

    public function unique($column)
    {
        $this->columns[$column] .= ' UNIQUE';
        return $this;
    }

    public function index($column)
    {
        $this->columns[] = "INDEX($column)";
        return $this;
    }

    public function string($column, $length = 256)
    {
        $this->columns[$column] = "$column VARCHAR($length)";
        return $this;
    }

    public function timestamps(String $createdAt = 'created_at', String $updatedAt = 'updated_at')
    {
        $this->columns[$createdAt] = "$createdAt DATETIME NULL";
        $this->columns[$updatedAt] = "$updatedAt DATETIME NULL";
        return $this;
    }
}
