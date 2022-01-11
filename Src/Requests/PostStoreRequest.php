<?php

namespace Wordpress\Requests;

use Wordpress\Validations\ValidateInputs;

class PostStoreRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ];
    }

    public function validate(Array $data)
    {
        $validator     = new ValidateInputs($data);
        $validatedData = $validator->passingInputsThrowValidationRules($this->rules());
        return $validatedData;
    }
}
