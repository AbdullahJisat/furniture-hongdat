<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomClasses\Validation;
use App\Content;
use App\Slug;
use App\ContentMenu;
use Illuminate\Support\Facades\URL;

class ContentController extends Controller
{

    //
    public function saveContent(Request $request)
    {

        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $menu = $request->input('menu');
        $category = $request->input('category');
        $title = $request->input('title');
        $description = $request->input('description');
        $meta_title = $request->input('meta_title');
        $meta_keyword = $request->input('meta_keyword');
        $meta_description = $request->input('meta_description');
        $image_title = $request->input('image_title');
        $alt_tag = $request->input('alt_tag');
        $content_description = $request->input('content_description');
        $more_images = json_decode($request->input('more_images'), true);
        $page_slug = $this->getPageSlug($title);
        $active = 1;

        $date = date("M d");

        $validation = new Validation();
        array_push($validation_inputs, $title);
        if ($validation->FormValidation($validation_inputs)) {
            $img_id = 'image';
            $image_path = $this->saveFile($request, $img_id, $page_slug, $menu);
            if (empty($image_path)) {
                return 0;
            }
            if (empty($page_slug)) {
                return 0;
            }
            if (Content::store($menu, $category, $title, $description, $meta_title, $meta_keyword, $meta_description, $image_path, $image_title, $alt_tag, $content_description, $more_images, $page_slug, $active, $user_id, $date)) {

                Slug::store($page_slug, $menu, $user_id, $active);
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getAllContent()
    {
        $content = Content::getAll();
        return json_encode($content);
    }

    public function getContent(Request $request)
    {
        $id = $request->input('id');
        $content = Content::getContent($id);
        return json_encode($content);
    }

    public function editContent(Request $request)
    {
        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $id = $request->input('id');
        $menu = json_decode($request->input('s_menu'));
        $title = $request->input('title');
        $description = $request->input('description');
        $meta_title = $request->input('meta_title');
        $meta_keyword = $request->input('meta_keyword');
        $meta_description = $request->input('meta_description');
        $image_title = $request->input('image_title');
        $alt_tag = $request->input('alt_tag');
        $content_description = $request->input('content_description');
        $more_images = json_decode($request->input('more_images'), true);
        $page_slug = $request->input('slug');
        $active = $request->input('active');
        $slug_change = $request->input('slug_change');
        $old_slug = $request->input('old_slug');

        $validation = new Validation();
        array_push($validation_inputs, $title);
        if ($validation->FormValidation($validation_inputs)) {
            $img_id = 'image';
            $image_path = $this->saveFile($request, $img_id, $page_slug, $menu);

            if ($slug_change == 1) {
                if (Slug::isExists($page_slug)) {
                    return 3;
                }

                Slug::edit($old_slug, $page_slug, $menu, $user_id);
            }

            if (Content::edit($id, $menu, $title, $description, $meta_title, $meta_keyword, $meta_description, $image_path, $image_title, $alt_tag, $content_description, $more_images, $page_slug, $active, $user_id)) {

                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function saveFile($request, $id, $page_slug, $type)
    {
        if ($request->hasFile($id)) {
            $image = $request->file($id);
            $slug = str_replace("/", "-", $page_slug);
            $name = $slug . '-' . time() . '.' . $image->getClientOriginalExtension();
            if ($type == 1) {
                $destinationPath = base_path('images/service');
                $image->move($destinationPath, $name);
                $image_location = "images/service/" . $name;
            } else if ($type == 2) {
                $destinationPath = base_path('images/blog');
                $image->move($destinationPath, $name);
                $image_location = "images/blog/" . $name;
            } else if ($type == 3) {
                $destinationPath = base_path('images/package');
                $image->move($destinationPath, $name);
                $image_location = "images/package/" . $name;
            } else {
                $destinationPath = base_path('images/slider');
                $image->move($destinationPath, $name);
                $image_location = "images/slider/" . $name;
            }
            return $image_location;
        }
    }

    public function getActiveContent()
    {
        $content = Content::getActiveContents();
        return json_encode($content);
    }

    public function getPageSlug($title)
    {
        $generated_slug = str_replace(" ", "-", strtolower($title));
        $slug = $this->checkForExistence($generated_slug);
        return $slug;
    }

    public function checkForExistence($slug)
    {
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

    public function saveContentImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = base_path('/images/content');
            $image->move($destinationPath, $name);
            $image_location = "/images/content/" . $name;
            return URL::to('/') . $image_location;
        }
    }

    public function saveImgs(Request $request)
    {

        $type = $request->input('type');
        dd($type);
        $img_id = 'doc_image';
        $image_path = $this->saveImgFile($request, $img_id, $type);
        $result = array(
            "path" => $image_path
        );
        $response = json_encode($result);
        return $response;
    }

    public function saveImgFile($request, $id, $type)
    {
        if ($request->hasFile($id)) {
            $image = $request->file($id);

            $lead_name = time();
            $name = $lead_name . '.' . $image->getClientOriginalExtension();

            if ($type == 1) {
                $destinationPath = base_path('images/service');
                $image->move($destinationPath, $name);
                $image_location = "images/service/" . $name;
            } else if ($type == 2) {
                $destinationPath = base_path('images/blog');
                $image->move($destinationPath, $name);
                $image_location = "images/blog/" . $name;
            } else if ($type == 3) {
                $destinationPath = base_path('images/package');
                $image->move($destinationPath, $name);
                $image_location = "images/package/" . $name;
            } else if ($type == 4) {
                $destinationPath = base_path('images/slider');
                $image->move($destinationPath, $name);
                $image_location = "images/slider/" . $name;
            } else if ($type == 5) {
                $destinationPath = base_path('images/portfolio');
                $image->move($destinationPath, $name);
                $image_location = "images/portfolio/" . $name;
            }


            return $image_location;
        }
    }

    public function contentMenu()
    {
        $content = ContentMenu::getAll();
        return json_encode($content);
    }
}
