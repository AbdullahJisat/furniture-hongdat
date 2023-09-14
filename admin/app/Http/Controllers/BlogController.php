<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClasses\Validation;
use App\Blog;
use App\Slug;
use Illuminate\Support\Facades\URL;

class BlogController extends Controller {

    //
    public function saveBlog(Request $request) {

        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $title = $request->input('title');
        $description = $request->input('blog_description');
        $meta_keywords = $request->input('meta_keywords');
        $meta_title = $request->input('meta_title');
        $meta_description = $request->input('meta_description');
        $page_slug = $this->getPageSlug($title);
        $active = 1;
        $validation = new Validation();
        array_push($validation_inputs, $title, $description);
        if ($validation->FormValidation($validation_inputs)) {
            $img_id = 'blog_image';
            $image_path = $this->saveFile($request, $img_id, $page_slug);
            if (empty($image_path)) {
                return 0;
            }
            if (empty($page_slug)) {
                return 0;
            }
            if (Blog::store($title, $description, $meta_keywords, $meta_description, $page_slug, $image_path, $active, $user_id, $meta_title)) {
                $type = 1; // 1-Blog
                Slug::store($page_slug, $type, $user_id, $active);
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getAllBlog() {
        $blogs = Blog::getAll();
        return json_encode($blogs);
    }

    public function getBlog(Request $request) {
        $id = $request->input('id');
        $blogs = Blog::getBlog($id);
        return json_encode($blogs);
    }

    public function editBlog(Request $request) {
        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $id = $request->input('id');
        $title = $request->input('edit_title');
        $meta_title = $request->input('edit_meta_title');
        $description = $request->input('blog_description');
        $meta_keywords = $request->input('edit_meta_keywords');
        $meta_description = $request->input('edit_meta_description');
        $page_slug = $request->input('edit_page_slug');
        $active = $request->input('active');
        $slug_change = $request->input('slug_change');
        $old_slug = $request->input('old_slug');

        $validation = new Validation();
        array_push($validation_inputs, $title, $description);
        if ($validation->FormValidation($validation_inputs)) {
            $img_id = 'edit_blog_image';
            $image_path = $this->saveFile($request, $img_id, $page_slug);

            if ($slug_change == 1) {
                if (Slug::isExists($page_slug)) {
                    return 3;
                }
                $type = 1; // 1-Blog
                Slug::edit($old_slug, $page_slug, $type, $user_id);
            }

            if (Blog::edit($id, $title, $description, $meta_keywords, $meta_description, $page_slug, $image_path, $active, $user_id, $meta_title)) {

                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function saveFile($request, $id, $page_slug) {
        if ($request->hasFile($id)) {
            $image = $request->file($id);
            $slug = str_replace("/", "-", $page_slug);
            $name = $slug . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = base_path('/images/blog');
            $image->move($destinationPath, $name);
            $image_location = "/images/blog/" . $name;
            return $image_location;
        }
    }

    public function getActiveBlog() {
        $blogs = Blog::getActiveBlogs();
        return json_encode($blogs);
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

    public function saveBlogImage(Request $request) {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = base_path('/images/blog');
            $image->move($destinationPath, $name);
            $image_location = "/images/blog/" . $name;
            return URL::to('/') . $image_location;
        }
    }

}
