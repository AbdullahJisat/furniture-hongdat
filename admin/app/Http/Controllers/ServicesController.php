<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Services;
use App\CustomClasses\Validation;
use App\OrderServices;
use App\Order;
use App\Slug;

class ServicesController extends Controller {

    //
    public function saveService(Request $request) {
        $image_path = "";
        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $services_category_id = $request->input('services_category');
        $name = $request->input('services_name');
        $slug = $this->getPageSlug($name);
        $duration = $request->input('services_duration');
        $active = $request->input('active');
        $description = $request->input('description');
        $price = $request->input('price');
        $validation = new Validation();
        array_push($validation_inputs, $name, $services_category_id);
        if ($validation->FormValidation($validation_inputs)) {

            if (Services::checkForExistance($services_category_id, $name) > 0) {
                return 3;
            }
            if (empty($slug)) {
                return 4;
            }
            $img_id = 'service_image';
            $image_path = $this->saveFile($request, $img_id, $slug);
            if (Services::store($services_category_id, $name, $duration, $active, $user_id, $description, $price, $image_path, $slug)) {
                $type = 3; // 3-Services
                Slug::store($slug, $type, $user_id, $active);
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getAllServices() {
        $all_services = Services::getAll();
        return json_encode($all_services);
    }

    public function getService(Request $request) {
        $id = $request->input('id');
        $services = Services::getService($id);
        return json_encode($services);
    }

    public function editService(Request $request) {
        $image_path = "";
        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $id = $request->input('id');
        $services_category_id = $request->input('services_category_id');
        $name = $request->input('name');
        $slug = $request->input('slug');
        $duration = $request->input('duration');
        $active = $request->input('active');
        $active_time = $request->input('active_time');
        $price = $request->input('edit_services_price');
        $description = $request->input('edit_services_description');
        $slug_change = $request->input('slug_change');
        $old_slug = $request->input('old_slug');
        $validation = new Validation();
        array_push($validation_inputs, $name, $services_category_id);
        if ($validation->FormValidation($validation_inputs)) {
            if (Services::checkForExistance($services_category_id, $name, $id) > 0) {
                return 3;
            }

            if ($slug_change == 1) {
                if (Slug::isExists($slug)) {
                    return 5;
                }
                $type = 3; // 3-Services
                Slug::edit($old_slug, $slug, $type, $user_id);
            }
            $img_id = 'edit_services_image_path';
            $image_path = $this->saveFile($request, $img_id, $slug);
            if (Services::edit($id, $services_category_id, $name, $duration, $active, $active_time, $user_id, $description, $price, $image_path, $slug)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function saveFile($request, $id, $slug) {
        if ($request->hasFile($id)) {
            $image = $request->file($id);
            $page_slug = str_replace("/", "-", $slug);
            $name = $page_slug . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/service');
            $image->move($destinationPath, $name);
            $image_location = "/images/service/" . $name;
            return $image_location;
        }
    }

    public function getActiveServices() {
        $services = Services::getActiveServices();
        return json_encode($services);
    }

    public function checkForAssaigned($id) {
        $order_services = OrderServices::getOrdersByServices($id);
        foreach ($order_services as $order_service) {
            $order_status = Order::getStatusOfOrder($order_service->order_id);
            if ($order_status == 0 || $order_status == 1 || $order_status == 2) {
                return true;
            }
        }
        return false;
    }

    public function getPageSlug($title) {
        $generated_slug = str_replace(" ", "-", strtolower($title));
        $slug = $this->checkForExistence($generated_slug);
        return $slug;
    }

    public function checkForExistence($slug) {
        if (Slug::isExists($slug)) {
            for ($i = 1; $i <= 10; $i++) {
                $new_slug = $slug . "-" . $i;
                if (!Slug::isExists($new_slug)) {
                    return $new_slug;
                }
            }
        } else {
            return $slug;
        }
    }

    public function deleteService(Request $request) {
        if (!\Auth::check()) {
            return 2;
        }

        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $id = $request->input('id');
        $validation = new Validation();
        array_push($validation_inputs, $id);
        if ($validation->FormValidation($validation_inputs)) {
            if (Services::deleteService($id)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

}
