<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageSlider extends Model {

    protected $table = 'image_sliders';

    public static function store($title, $description, $button_text, $url, $image_path, $active, $user_id) {
        $slider = new ImageSlider();
        $slider->title = $title;
        $slider->description = $description;
        $slider->button_text = $button_text;
        $slider->url = $url;
        $slider->image_path = $image_path;
        $slider->active = $active;
        $slider->created_by = $user_id;
        $slider->updated_by = $user_id;
        return $slider->save();
    }

    public static function edit($id, $title, $description, $button_text, $url, $image_path, $active, $user_id) {
        $slider = self::find($id);
        $slider->title = $title;
        $slider->description = $description;
        $slider->button_text = $button_text;
        $slider->url = $url;
        if ($image_path != "") {
            $slider->image_path = $image_path;
        }

        $slider->active = $active;
        $slider->updated_by = $user_id;
        return $slider->save();
    }

    public static function getAll() {
        $sliders = self::orderBy('id', 'DESC')->get();
        return $sliders;
    }

    public static function getActiveSliders() {
        $sliders = self::select('title', 'description', 'button_text', 'url', 'image_path')
                        ->where('active', 1)
                        ->orderBy('id', 'DESC')->get();
        return $sliders;
    }

    public static function getSlider($id) {
        $slider = self::find($id);
        return $slider;
    }

}
