<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClasses\Validation;
use App\ContactUs;

class ContactUsController extends Controller {

    public function getAllContactUs() {
        $contact_us = ContactUs::getAll();
        return json_encode($contact_us);
    }

    public function getContactUs(Request $request) {
        $id = $request->input('id');
        $contact_us = ContactUs::getContactUs($id);
        return json_encode($contact_us);
    }

    public function editContactUs(Request $request) {
        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $id = $request->input('id');
        $showroom_address = $request->input('showroom_address');
        $factory_address = $request->input('factory_address');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $mobile = $request->input('mobile');
        $fax = $request->input('fax');
        $sending_email = $request->input('sending_email');

        $validation = new Validation();
        array_push($validation_inputs, $showroom_address, $email, $phone);
        if ($validation->FormValidation($validation_inputs)) {

            if (ContactUs::edit($id, $showroom_address, $factory_address, $email, $phone, $mobile, $fax, $user_id, $sending_email)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getActiveContactUs() {
        $contact_us = ContactUs::getActiveContactUs();
        return json_encode($contact_us);
    }

}
