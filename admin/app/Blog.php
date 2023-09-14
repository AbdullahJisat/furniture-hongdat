<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

    protected $table = 'blogs';

    public static function store($title, $description, $meta_keywords, $meta_description, $page_slug, $image_path, $active, $user_id, $meta_title) {
        $blog = new Blog();
        $blog->title = $title;
        $blog->description = $description;
        $blog->meta_title = $meta_title;
        $blog->meta_keywords = $meta_keywords;
        $blog->meta_description = $meta_description;
        $blog->page_slug = $page_slug;
        $blog->image_path = $image_path;
        $blog->active = $active;
        $blog->created_by = $user_id;
        $blog->updated_by = $user_id;
        return $blog->save();
    }

    public static function edit($id, $title, $description, $meta_keywords, $meta_description, $page_slug, $image_path, $active, $user_id, $meta_title) {
        $blog = self::find($id);
        $blog->title = $title;
        $blog->description = $description;
        $blog->meta_title = $meta_title;
        $blog->meta_keywords = $meta_keywords;
        $blog->meta_description = $meta_description;
        $blog->page_slug = $page_slug;
        if ($image_path != "") {
            $blog->image_path = $image_path;
        }
        $blog->active = $active;
        $blog->updated_by = $user_id;
        return $blog->save();
    }

    public static function getAll() {
        $blogs = self::orderBy('id', 'DESC')->get();
        return $blogs;
    }

    public static function getActiveBlogs() {
        $blogs = self::select('title', 'description', 'page_slug', 'meta_keywords', 'meta_description', 'image_path', 'meta_title')
                        ->where('active', 1)
                        ->orderBy('id', 'DESC')->get();
        return $blogs;
    }

    public static function getBlog($id) {
        $blog = self::find($id);
        return $blog;
    }

    public static function getBlogBySlug($slug) {
        $blog = self::where('page_slug', $slug)->first();
        return $blog;
    }

}
