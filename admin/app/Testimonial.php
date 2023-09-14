<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model {

    protected $table = 'testimonials';

    public static function store($title, $description, $platfrom, $date, $image_path, $active, $user_id, $slug) {
        $testimonial = new Testimonial();
        $testimonial->title = $title;
        $testimonial->description = $description;
        $testimonial->platform = $platfrom;
        $testimonial->date = $date;
        $testimonial->image_path = $image_path;
        $testimonial->slug = $slug;
        $testimonial->active = $active;
        $testimonial->created_by = $user_id;
        $testimonial->updated_by = $user_id;
        return $testimonial->save();
    }

    public static function edit($id, $title, $description, $platfrom, $date, $image_path, $active, $user_id, $slug) {
        $testimonial = self::find($id);
        $testimonial->title = $title;
        $testimonial->description = $description;
        $testimonial->platform = $platfrom;
        $testimonial->date = $date;
        if (!empty($image_path)) {
            $testimonial->image_path = $image_path;
        }
        $testimonial->slug = $slug;
        $testimonial->active = $active;
        $testimonial->updated_by = $user_id;
        return $testimonial->save();
    }

    public static function getAll() {
        $testimonials = self::orderBy('id', 'DESC')->get();
        return $testimonials;
    }

    public static function getActiveTestimonials() {
        $testimonials = self::select('title', 'description', 'date', 'platform', 'image_path', 'slug')
                        ->where('active', 1)
                        ->orderBy('date', 'DESC')->get();
        return $testimonials;
    }

    public static function getActiveLatestestTimonials() {
        $testimonials = self::select('title', 'description', 'date', 'platform', 'image_path', 'slug')
                        ->where('active', 1)
                        ->take(6)
                        ->orderBy('date', 'DESC')->get();
        return $testimonials;
    }

    public static function getTestimonialBySlug($slug) {
        $testimonials = self::select('title', 'description', 'date', 'platform', 'image_path', 'slug')
                        ->where('slug', $slug)->first();
        return $testimonials;
    }

    public static function getTestimonial($id) {
        $testimonial = self::find($id);
        return $testimonial;
    }

}
