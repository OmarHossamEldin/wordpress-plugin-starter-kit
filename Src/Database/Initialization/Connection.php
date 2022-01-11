<?php

namespace Wordpress\Database\Initialization;

class Connection
{
    /**
     * holds database connection
     */
    protected $db;

    public function __construct()
    {
        $this->db = $GLOBALS['wpdb'];
    }

    public function getDb()
    {
        return $this->db;
    }
}
