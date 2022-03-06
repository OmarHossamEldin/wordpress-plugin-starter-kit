<?php

namespace Wordpress\Support\Facades\Validations;

use Wordpress\Exceptions\UnsupportedValidationRuleException;
use Wordpress\Support\Facades\Localization\Translate;
use Wordpress\Helpers\ArrayValidator;
use Wordpress\Support\Debug\Debugger;

class ValidateInputs
{
    private array $inputs = [];
    private array $errors = [];

    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    public function passing_inputs_throw_validation_rules($rules): bool
    {
        $arrayValidator = new ArrayValidator($rules);
        foreach ($rules as $key => $rule) {
            if ($arrayValidator->array_keys_exists($key) !== false) {
                switch ($rule) {
                    case 'required':
                        !!trim($this->inputs[$key]) ? $this->inputs[$key] = $this->inputs[$key] : $this->errors[$key] = Translate::translate('validations', $rule);
                        break;
                    case 'nullable':
                        $this->inputs[$key] = $this->inputs[$key] === '' ? $this->inputs[$key] : $this->inputs[$key];
                        break;
                    default:
                        throw new UnsupportedValidationRuleException();
                }
            }
        }
        return true;
    }

    public function get_errors(): array
    {
        return $this->errors;
    }

    public function get_validated_inputs(): array
    {
        return $this->inputs;
    }
}