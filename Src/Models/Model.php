<?php

namespace Wordpress\Models;

use Wordpress\Database\Initialization\Connection;


class Model extends Connection
{
    /**
     * table name $table
     */

    protected $table    = '';

    /**
     * table name $table
     */

    protected $primaryKey  = 'id';
    /**
     * colums to insert for access
     */

    protected $fillable = [];

    /**
     * columns to select
     */
    private $columns = '*';
    /**
     * query will fetch
     */
    private $query = '';

    public function select(String ...$columns)
    {

        $this->columns = implode(',', $columns);

        $this->query = <<<QUERY
        SELECT $this->columns FROM $this->table
        QUERY;
        return $this;
    }

    public function orderBy(String $column, String $orderBy)
    {
        $this->query .= <<<QUERY
           ORDER BY $column $orderBy
        QUERY;
        return $this;
    }

    public function where(String $column, String $value)
    {
        $this->query .= <<<QUERY
            WHERE $column='$value'
        QUERY;
        return $this;
    }

    public function whereLike(String $column, String $value)
    {
        $this->query .= <<<QUERY
            $column LIKE '%$value%'
        QUERY;
        return $this;
    }

    public function count(String $column)
    {
        $this->query = <<<QUERY
            SELECT COUNT($column) AS count
            FROM $this->table
        QUERY;
        $count = $this->db->query($this->query);
        return $count;
    }

    public function paginate($limit = 10, $currentPage = 1)
    {
        $offset = ($currentPage - 1) * $limit;
        $rows = $this->db->query($this->query,);
        $count = count($rows);
        $this->query .= <<<QUERY
            LIMIT $offset, $limit
        QUERY;
        $rows = $this->db->query($this->query,);
        $totalPages = ceil($count / $limit);
        $lastPage = $currentPage <= 1 ? '' : $currentPage - 1;
        $nextPage = $currentPage < $totalPages ? $currentPage + 1 : '';
        return [
            'totalPages' => $totalPages,
            'lastPage' => $lastPage,
            'nextPage' => $nextPage,
            'currentPage' => $currentPage,
            'data'  =>  $rows
        ];
    }

    public function create(array $values)
    {
        $columns = implode(',', $this->fillable);
        $binds  = array_map(fn ($colum) => $colum = ":$colum", $this->fillable);
        $binds  = implode(',', $binds);
        $this->query = <<<QUERY
            INSERT INTO $this->table 
            ($columns,created_at,updated_at) 
            VALUES ($binds,:created_at,:updated_at)
        QUERY;

        $date = new \DateTime();
        $values['created_at'] = $date->format('Y-m-d H:i:s');
        $values['updated_at'] = $date->format('Y-m-d H:i:s');

        try {
            $rows = $this->db->prepare($this->query, $values);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $rows;
    }

    public function update(array $values, int $id)
    {
        $keys = array_keys($values);

        $binds  = array_map(fn ($colum) => $colum = "$colum = :$colum", $keys);

        $binds  = implode(',', $binds);


        $this->query = <<<QUERY
            UPDATE $this->table
            SET   $binds
            WHERE $this->primaryKey= :$this->primaryKey
        QUERY;

        $values['id'] = $id;

        try {
            $rows = $this->db->prepare($this->query, $values);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $rows;
    }

    public function delete(int $id)
    {
        $this->query = <<<QUERY
            DELETE FROM $this->table
            WHERE $this->primaryKey=:$this->primaryKey
        QUERY;

        $value['id'] = $id;
        try {
            $this->db->prepare($this->query, $value);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $stmt;
    }

    public function toSql(): string
    {
        return $this->query;
    }

    public function all()
    {
        $this->query = <<<QUERY
            SELECT $this->columns
            FROM $this->table
        QUERY;
        $rows = $this->db->query($this->query);
        return $rows;
    }

    public function get()
    {
        $rows =  $this->db->query($this->query);
        return $rows;
    }

    public function first()
    {
        $this->query .= <<<QUERY
            LIMIT 1
        QUERY;
        $rows = $this->db->query($this->query);
        return $rows;
    }

    public function with(string ...$relations)
    {
        array_map(function ($relation) {
            if (method_exists($this, $relation)) {
                return call_user_func([$this, $relation]);
            }
        }, $relations);
        return  $this;
    }


    public function belongsTo($class, $foreign = null)
    {

        try {
            if (class_exists($class)) {
                $class = new $class;
                $table = $class->table;
                $primary_key = $class->primaryKey;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $foreign ??= $primary_key;

        $this->query .= <<<QUERY
         FROM $this->table JOIN $table
        ON  $this->table.$foreign = $table.$primary_key
        QUERY;
        $rows = $this->db->query($this->query);

        return $rows;
    }




    public function hasMany($class, $id)
    {
        try {
            if (class_exists($class)) {
                $class = new $class;
                $table = $class->table;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $this->query .= <<<QUERY
         FROM $this->table JOIN $table
        ON  $this->table.$this->primaryKey = $table.$id
        QUERY;
        $rows = $this->db->query($this->query);

        return $rows;
    }
}
