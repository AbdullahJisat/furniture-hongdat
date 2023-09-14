<?php

namespace App\CustomClasses;

class Validation {

    public function loginFormValidation($username, $password) {
        if (empty($username) || empty($password)) {
            return 0;
        }
        return 1;
    }

    public function FormValidation($validation_inputs) {
        foreach ($validation_inputs as $validation_input) {
            if (empty($validation_input)) {
                return 0;
            }
        }
        return 1;
    }

}
