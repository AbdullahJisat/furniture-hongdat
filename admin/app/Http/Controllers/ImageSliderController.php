<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageSlider;

class ImageSliderController extends Controller {

    //
    public function saveSlider(Request $request) {

        if (!\Auth::check()) {
            return 2;
        }

        $user_id = \Auth::user()->id;
        $title = $request->input('title');
        $description = $request->input('description');
        $button_text = $request->input('button_text');
        $url = $request->input('button_link');
        $active = 1;
        $img_id = 'slider_image';
        $image_path = $this->saveFile($request, $img_id);
        if (empty($image_path)) {
            return 0;
        }
        if (ImageSlider::store($title, $description, $button_text, $url, $image_path, $active, $user_id)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getAllSliders() {
        $all_sliders = ImageSlider::getAll();
        return json_encode($all_sliders);
    }

    public function getSlider(Request $request) {
        $id = $request->input('id');
        $slider = ImageSlider::getSlider($id);
        return json_encode($slider);
    }

    public function editSlider(Request $request) {
        if (!\Auth::check()) {
            return 2;
        }

        $user_id = \Auth::user()->id;
        $id = $request->input('id');
        $title = $request->input('edit_title');
        $description = $request->input('edit_description');
        $button_text = $request->input('edit_button_text');
        $url = $request->input('edit_button_url');
        $active = $request->input('active');
        $img_id = 'edit_slider_image';
        $image_path = $this->saveFile($request, $img_id);

        if (ImageSlider::edit($id, $title, $description, $button_text, $url, $image_path, $active, $user_id)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function saveFile($request, $id) {
        if ($request->hasFile($id)) {
            $image = $request->file($id);

            $lead_name = time();
            $name = $lead_name . '.' . $image->getClientOriginalExtension();


            $destinationPath = base_path('images/slider');
            $image->move($destinationPath, $name);
            $image_location = "images/slider/" . $name;

            return $image_location;
        }
    }

    public function getActiveSliders() {
        $sliders = ImageSlider::getActiveSliders();
        return json_encode($sliders);
    }

}
