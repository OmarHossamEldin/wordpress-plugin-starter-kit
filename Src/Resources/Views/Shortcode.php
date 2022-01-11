<?php

namespace wordpress\Resources\Views;

class Shortcode
{
    public static function shortcode()
    {
        global $wpdb;
        $results = $wpdb->get_results("Select * from wp_items");
        if (!empty($results)) {
            echo "<select name='sortable'>";
            foreach ($results as $result) {
                $id = $result->id;
                $name = $result->name;
                echo '<option value="' . $id . '">' . $name . '</option>';
            }
            echo "</select>";
        }
        return $results;
    }
}
