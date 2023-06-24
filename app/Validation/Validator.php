<?php

namespace App\Validation;

class Validator
{
    private array $data;
    private ?array $errors = [];

    public function __construct(array $data)
    {
        $this->data = $data;

    }
    private function getErrors(): ?array
    {
        return $this->errors;
    }
    public function validate(array $rules): ?array
    {
        foreach ($rules as $name => $rulesarray) {
            if (array_key_exists($name, $this->data)) {
                foreach ($rulesarray as $rules) {
                    switch ($rules) {
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                        case substr($rules, 0, 3) === 'min':
                            $this->min($name, $this->data[$name], $rules);
                            break;
                        default :
                            break;
                    }
                }
            }
        }
        return $this->getErrors();
    }

    private function required(string $name, string $value)
    {
        $value = trim($value);

        if (empty($value)) {
            $this->errors[$name][] = "$name est requis.";
        }
    }

    private function min(string $name, string $value, string $rules)
    {
        preg_match_all('/(\d+)/', $rules, $matches);

        $limit = (int)$matches[0][0];

        if (strlen($value) < $limit) {
            $this->errors[$name][] = "$name doit comprendre un minimum de $limit caractères";
        }
    }


}