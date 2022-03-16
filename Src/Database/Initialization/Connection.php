<?php

namespace Wordpress\Database\Initialization;

class Connection
{
    protected $db;

    public function __construct()
    {
        $this->db = $GLOBALS['wpdb'];
    }

    /**
     * get database connection
     *
     * @return object
     */
    public function get_db(): object
    {
        return $this->db;
    }

    /**
     * used for debugging query
     *
     * @return boolean
     */
    public function show_error_mode(): bool
    {
        $this->db->show_errors();
        return true;
    }
}
