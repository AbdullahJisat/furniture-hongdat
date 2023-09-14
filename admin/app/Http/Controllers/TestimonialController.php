<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use App\Slug;

class TestimonialController extends Controller {

    //
    public function saveTestimonial(Request $request) {

        if (!\Auth::check()) {
            return 2;
        }

        $user_id = \Auth::user()->id;
        $title = $request->input('title');
        $content_description = $request->input('content_description');
        $description = ltrim($content_description, " ");
        $platfrom = $request->input('platform');
        $date = $request->input('date');
        $slug = $this->getPageSlug($title);
        $img_id = 'image';
        $image_path = $this->saveFile($request, $img_id);

        $active = 1;

        if (Testimonial::store($title, $description, $platfrom, $date, $image_path, $active, $user_id, $slug)) {
            $type = 7; // Testimonial
            Slug::store($slug, $type, $user_id, $active);
            return 1;
        } else {
            return 0;
        }
    }

    public function getAllTestimonials() {
        $all_testimonials = Testimonial::getAll();
        return json_encode($all_testimonials);
    }

    public function getTestimonial(Request $request) {
        $id = $request->input('id');
        $testimonial = Testimonial::getTestimonial($id);
        return json_encode($testimonial);
    }

    public function editTestimonial(Request $request) {
        if (!\Auth::check()) {
            return 2;
        }

        $user_id = \Auth::user()->id;
        $id = $request->input('id');
        $title = $request->input('title');
        $content_description = $request->input('content_description');
        $description = ltrim($content_description, " ");
        $platfrom = $request->input('platform');
        $date = $request->input('date');

        $active = $request->input('active');

        $img_id = 'image';
        $image_path = $this->saveFile($request, $img_id);
        $slug = $request->input('slug');
        $slug_change = $request->input('slug_change');
        $old_slug = $request->input('old_slug');

        if ($slug_change == 1) {
            if (Slug::isExists($slug)) {
                return 5;
            }
            $type = 7; // 3-Services
            Slug::edit($old_slug, $slug, $type, $user_id);
        }

        if (Testimonial::edit($id, $title, $description, $platfrom, $date, $image_path, $active, $user_id, $slug)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getActiveTestmonial() {
        $testimonials = Testimonial::getActiveTestimonial();
        return json_encode($testimonials);
    }

    public function saveFile($request, $id) {
        $image_location = "";
        if ($request->hasFile($id)) {
            $image = $request->file($id);

            $lead_name = time();
            $name = $lead_name . '.' . $image->getClientOriginalExtension();


            $destinationPath = base_path('images/testimonial');
            $image->move($destinationPath, $name);
            $image_location = "images/testimonial/" . $name;
        }
        return $image_location;
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

}
