<?php

namespace Wordpress\Controllers;

use Wordpress\Helpers\Response;
use Wordpress\Models\Task;
use Wordpress\Requests\TaskStoreRequest;
use Wordpress\Support\Template\View;

class TasksController extends BaseController
{
    public function index()
    {
        $test = 'test';
        return View::render('admin/index', ['test' => $test]);
    }

    public function store()
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

            return Response::json(['message' => 'Task Created Successfully.'], 201);
        }
        return Response::json(['message' => 'error has been occurred'], 422);
    }

    public function destroy()
    {
        // $task = new Task;
        // $task->delete($this->request['id']);
        // echo 'Task Removed Successfully.';
        return Response::json(204);
    }
}
