<?php

namespace Wordpress\Database\Initialization;

use Wordpress\Exceptions\ModelInsertionException;
use Wordpress\Support\Facades\Http\Request;
use Wordpress\Support\DateTime\WpCarbon;
use Wordpress\Helpers\ArrayValidator;
use Wordpress\Support\Debug\Debugger;

abstract class Model extends Connection
{
    public function __construct()
    {
        parent::__construct();
        $request = new Request();
        $data = $request->get_route_params();
        if (!!$data) {
            $data = $this->first($data['id']);
            if (!!$data) {
                $this->set_query_result($data);
            }
        }
    }
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
     * timestamp
     */
    protected $created_at = 'created_at';

    /**
     * update timestamp
     */
    protected $updated_at = 'updated_at';

    /**
     * query will fetch
     */
    private $query = '';

    /**
     * dataResult
     *
     * @var string
     */
    private $dataResult = '';

    public function set_query_result($data): self
    {
        $this->dataResult = $data;
        return $this;
    }

    public function get_query_result()
    {
        return $this->dataResult;
    }
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
        $count = $this->db->get_results($this->query);
        return $count;
    }

    public function paginate($limit = 10, $currentPage = 1)
    {
        $offset = ($currentPage - 1) * $limit;
        $rows = $this->db->get_results($this->query,);
        $count = count($rows);
        $this->query .= <<<QUERY
            LIMIT $offset, $limit
        QUERY;
        $rows = $this->db->get_results($this->query,);
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
        $arrayValidator = new ArrayValidator();
        if ($arrayValidator->keys_are_equal($this->fillable, array_keys($values))) {
            array_push($this->fillable, $this->created_at, $this->updated_at);
        } else {
            throw new ModelInsertionException();
        }
        $wpCarbon = new WpCarbon();
        $date = $wpCarbon->format('Y-m-d H:i:s');
        $values = array_values($values);
        array_push($values, $date, $date);
        $data = array_combine($this->fillable, $values);
        $this->db->insert($this->table, $data);
    }

    public function update(array $values, array $conditions)
    {
        if (!!strpos($this->table, 'wp_') === false) {
            $wpCarbon = new WpCarbon();
            $date = $wpCarbon->format('Y-m-d H:i:s');
            $values['updated_at'] = $date;
        }
        $this->db->update($this->table, $values, $conditions);
        Debugger::die_and_dump($this->show_error_mode());
    }

    public function delete(array $conditions)
    {
        $this->db->delete($this->table, $conditions);
    }



    public function all()
    {
        $this->query = <<<QUERY
            SELECT $this->columns
            FROM $this->table
        QUERY;
        $rows = $this->db->get_results($this->query);
        return $rows;
    }

    public function get()
    {
        $rows =  $this->db->get_results($this->query);
        return $rows;
    }

    public function first(?int $id = null)
    {
        if (!$id) {
            $this->query .= <<<QUERY
                LIMIT 1
            QUERY;
        } else {
            $this->query = "SELECT $this->columns FROM $this->table WHERE $this->primaryKey=$id LIMIT 1";
        }
        $row = $this->db->get_row($this->query);
        return $row;
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
        $rows = $this->db->get_results($this->query);

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
        $rows = $this->db->get_results($this->query);

        return $rows;
    }
    public function toSql(): string
    {
        return $this->query;
    }
}
