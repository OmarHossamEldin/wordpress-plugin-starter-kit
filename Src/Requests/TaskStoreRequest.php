<?php

namespace Wordpress\Requests;

use Wordpress\Validations\ValidateInputs;

class TaskStoreRequest
{
    public function rules()
    {
        return [
            'task' => 'required',
            'fromdate' => 'required',
            'todate' => 'required'
        ];
    }

    public function validate(Array $data)
    {
        $validator     = new ValidateInputs($data);
        $validatedData = $validator->passingInputsThrowValidationRules($this->rules());
        return $validatedData;
    }
}
