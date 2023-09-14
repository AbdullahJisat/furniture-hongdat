<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\CustomClasses\Validation;

class UserController extends Controller {

    public function saveUser(Request $request) {
//Check for Login
        if (!\Auth::check()) {
            return 2;
        }

        $user_id = \Auth::user()->id;

        $validation_inputs = array();
        $employee_id = $request->input('employee_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $password = $request->input('password');
        $active = $request->input('active');
//validate the empty feilds
        $validation = new Validation();
        array_push($validation_inputs, $employee_id, $name, $password, $email);
        if ($validation->FormValidation($validation_inputs)) {
//check for existence
            if (User::checkforExistance($employee_id) > 0) {
                return 3;
            }
            if (User::store($employee_id, $name, $password, $active, $user_id, $email, $mobile)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getAllUsers() {
        $user = User::getAll();
        return json_encode($user);
    }

    public function getUser(Request $request) {
        $id = $request->input('id');
        $user = User::getUser($id);
        return json_encode($user);
    }

    public function editUser(Request $request) {

        if (!\Auth::check()) {
            return 2;
        }
        $user_id = \Auth::user()->id;

        $validation_inputs = array();
        $id = $request->input('id');
        $employee_id = $request->input('employee_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $password = $request->input('password');
        $active = $request->input('active');
        $validation = new Validation();
        array_push($validation_inputs, $employee_id, $name, $email);
        if ($validation->FormValidation($validation_inputs)) {
            if (User::checkforExistance($employee_id, $id) > 0) {
                return 3;
            }
            if (User::edit($id, $employee_id, $name, $password, $active, $user_id, $email, $mobile)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getActiveUsers() {
        $user = User::getActiveUsers();
        return json_encode($user);
    }

    public function getUserDetails() {
        $admin = "";
        if (\Auth::check()) {
            $admin = Auth::user()->name;
        }
        return $admin;
    }

}
