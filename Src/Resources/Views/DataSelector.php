<?php

namespace wordpress\Resources\Views;

use Wordpress\Models\Task;

class DataSelector
{
    public static function selectdata()
    {
        $task = new Task;
        $tasks = $task->all();
        $select = '<select class="chosen" name="id">';
        foreach ($tasks as $task) {
            $select .= "<option value='$task->id'>$task->task</option>";
        }
        $select .= "</select>";
        return $select;
    }
}
