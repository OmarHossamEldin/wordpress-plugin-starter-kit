<?php

namespace Wordpress\Controllers;

use Wordpress\Models\Task;
use Wordpress\Requests\TaskStoreRequest;
use Wordpress\Support\Template\View;

class TasksController extends BaseController
{
    public function index()
    {
        echo View::render('InputForm.php');
    }

    public function create()
    {
        $validator =  new TaskStoreRequest;
        $validatedData = $validator->validate($this->request);
        if ($validatedData['task']) {
            $task = new Task;
            $task->create([
                'task' => $this->request['task'],
                'fromdate' => $this->request['fromdate'],
                'todate' => $this->request['todate']
            ]);
            echo 'Task Created Successfully.';
        }
        echo 'error';
    }

    public function destroy()
    {
        $task = new Task;
        $task->delete($this->request['id']);
        echo 'Task Removed Successfully.';
    }
}
