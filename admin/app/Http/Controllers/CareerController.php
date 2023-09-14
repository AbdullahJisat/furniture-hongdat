<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClasses\Validation;
use App\Career;

class CareerController extends Controller {

    //
    public function saveCareer(Request $request) {

        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $position = $request->input('position');
        $application_email = $request->input('application_email');
        $expiry_date = $request->input('expiry_date');
        $description = $request->input('description');

        $active = 1;
        $validation = new Validation();
        array_push($validation_inputs, $position, $description, $expiry_date);
        if ($validation->FormValidation($validation_inputs)) {
            if (Career::store($position, $application_email, $expiry_date, $description, $active, $user_id)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getAllCareer() {
        $careers = Career::getAll();
        return json_encode($careers);
    }

    public function getCareer(Request $request) {
        $id = $request->input('id');
        $career = Career::getCareer($id);
        return json_encode($career);
    }

    public function editCareer(Request $request) {
        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $id = $request->input('id');
        $position = $request->input('edit_position');
        $application_email = $request->input('edit_email');
        $expiry_date = $request->input('edit_expiry_date');
        $description = $request->input('edit_description');
        $active = $request->input('active');

        $validation = new Validation();
        array_push($validation_inputs, $position, $description, $expiry_date);
        if ($validation->FormValidation($validation_inputs)) {
            if (Career::edit($id, $position, $application_email, $expiry_date, $description, $active, $user_id)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getActiveCareer() {
        $careers = Career::getActiveCareers();
        return json_encode($careers);
    }

}
