<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\CustomClasses\Validation;
use App\Slug;

class PortfolioController extends Controller
{

    //
    public function saveCategory(Request $request)
    {

        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $title = $request->input('title');
        $type = $request->input('type');
        $description = $request->input('description');
        $meta_title = $request->input('meta_title');
        $meta_keyword = $request->input('meta_keyword');
        $meta_description = $request->input('meta_description');
        $image_title = $request->input('image_title');
        $alt_tag = $request->input('alt_tag');
        $page_slug = $this->getPageSlug($title);
        $active = $request->input('active');
        $validation = new Validation();
        array_push($validation_inputs, $title);
        if ($validation->FormValidation($validation_inputs)) {
            if (Category::checkForExistance($title) > 0) {
                return 3;
            }
            if (empty($page_slug)) {
                return 0;
            }
            $img_id = 'image';
            $image_path = $this->saveFile($request, $img_id, $page_slug);
            if (empty($image_path)) {
                return 0;
            }
            if (empty($page_slug)) {
                return 0;
            }

            if (Category::store($title, $description, $meta_title, $meta_keyword, $meta_description, $image_path, $image_title, $alt_tag, $page_slug, $active, $user_id, $type)) {
                $type = 5; // Category
                Slug::store($page_slug, $type, $user_id, $active);
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getAllCategory()
    {
        $all_services_category = Category::getAll();
        return json_encode($all_services_category);
    }
    public function getBlogCategory()
    {
        $all_services_category = Category::getBlogCategory();
        return json_encode($all_services_category);
    }

    public function getCategory(Request $request)
    {
        $id = $request->input('id');
        $services_category = Category::getCategory($id);
        return json_encode($services_category);
    }

    public function editCategory(Request $request)
    {
        $image_path = "";
        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $id = $request->input('id');
        $title = $request->input('title');
        $type = $request->input('type');
        $description = $request->input('description');
        $meta_title = $request->input('meta_title');
        $meta_keyword = $request->input('meta_keyword');
        $meta_description = $request->input('meta_description');
        $image_title = $request->input('image_title');
        $alt_tag = $request->input('alt_tag');

        $page_slug = $request->input('slug');
        $active = $request->input('active');
        $slug_change = $request->input('slug_change');
        $old_slug = $request->input('old_slug');
        $validation = new Validation();
        array_push($validation_inputs, $title);
        if ($validation->FormValidation($validation_inputs)) {
            if (Category::checkForExistance($title, $id) > 0) {
                return 3;
            }
            // $type = 5; // Portfolio Second Layer
            if ($slug_change == 1) {
                if (Slug::isExists($page_slug)) {
                    return 5;
                }

                Slug::edit($old_slug, $page_slug, $type, $user_id);
            }

            $img_id = 'image';
            $image_path = $this->saveFile($request, $img_id, $page_slug);

            if (Category::edit($id, $title, $description, $meta_title, $meta_keyword, $meta_description, $image_path, $image_title, $alt_tag, $page_slug, $active, $user_id, $type)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getActiveCategory()
    {
        $services_category = Category::getActiveCategory();
        return json_encode($services_category);
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

    //Product

    public function saveProduct(Request $request)
    {

        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $category = $request->input('category');
        $title = $request->input('title');
        $description = $request->input('description');
        $meta_title = $request->input('meta_title');
        $meta_keyword = $request->input('meta_keyword');
        $meta_description = $request->input('meta_description');
        $image_title = $request->input('image_title');
        $alt_tag = $request->input('alt_tag');

        $features = $request->input('feature');
        $content = $request->input('content');
        $specifications = $request->input('specs');
        $more_images = json_decode($request->input('more_images'), true);
        $downloads = json_decode($request->input('downloads'), true);
        $page_slug = $this->getPageSlug($title);
        $active = $request->input('active');

        $validation = new Validation();
        array_push($validation_inputs, $title);
        if ($validation->FormValidation($validation_inputs)) {
            if (Product::checkForExistance($title) > 0) {
                return 3;
            }
            if (empty($page_slug)) {
                return 0;
            }

            $img_id = 'image';
            $image_path = $this->savePortfolioImage($request, $img_id, $page_slug);
            if (empty($image_path)) {
                return 0;
            }



            if (Product::store($category, $title, $description, $meta_title, $meta_keyword, $meta_description, $image_path, $image_title, $alt_tag, $page_slug, $more_images, $downloads, $active, $user_id, $features, $content, $specifications)) {
                $type = 6; // portfolio Fourth Layer
                Slug::store($page_slug, $type, $user_id, $active);
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getAllProduct()
    {
        $all_products = Product::getAll();
        return json_encode($all_products);
    }

    public function getProduct(Request $request)
    {
        $id = $request->input('id');
        $product = Product::getProduct($id);
        return json_encode($product);
    }

    public function editProduct(Request $request)
    {
        $image_path = "";
        if (!\Auth::check()) {
            return 2;
        }
        $validation_inputs = array();
        $user_id = \Auth::user()->id;
        $id = $request->input('id');
        $category = json_decode($request->input('s_category'));
        $title = $request->input('title');
        $description = $request->input('description');
        $meta_title = $request->input('meta_title');
        $meta_keyword = $request->input('meta_keyword');
        $meta_description = $request->input('meta_description');
        $image_title = $request->input('image_title');
        $alt_tag = $request->input('alt_tag');
        $more_images = json_decode($request->input('more_images'), true);
        $downloads = json_decode($request->input('downloads'), true);
        $page_slug = $request->input('slug');
        $active = $request->input('active');
        $slug_change = $request->input('slug_change');
        $old_slug = $request->input('old_slug');

        $features = $request->input('feature');
        $content = $request->input('content');
        $specifications = $request->input('specs');

        $validation = new Validation();
        array_push($validation_inputs, $title);
        if ($validation->FormValidation($validation_inputs)) {
            if (Product::checkForExistance($title, $id) > 0) {
                return 3;
            }

            $img_id = 'image';
            $image_path = $this->savePortfolioImage($request, $img_id, $page_slug);


            if ($slug_change == 1) {
                if (Slug::isExists($page_slug)) {
                    return 5;
                }
                $type = 6; // 2-Service Category
                Slug::edit($old_slug, $page_slug, $type, $user_id);
            }

            if (Product::edit($id, $category, $title, $description, $meta_title, $meta_keyword, $meta_description, $image_path, $image_title, $alt_tag, $more_images, $downloads, $page_slug, $active, $user_id, $features, $content, $specifications)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getActiveProduct()
    {
        $services_category = Product::getActiveProduct();
        return json_encode($services_category);
    }

    public function savePortfolioImage($request, $id, $page_slug)
    {
        if ($request->hasFile($id)) {
            $image = $request->file($id);
            $slug = str_replace("/", "-", $page_slug);
            $name = $slug . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = base_path('/images/product');
            $image->move($destinationPath, $name);
            $image_location = "/images/product/" . $name;
            return $image_location;
        }
    }

    public function saveDownloadImage($request, $id, $page_slug)
    {
        if ($request->hasFile($id)) {
            $image = $request->file($id);
            $slug = str_replace("/", "-", $page_slug);
            $name = $slug . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = base_path('/images/download');
            $image->move($destinationPath, $name);
            $image_location = "/images/download/" . $name;
            return $image_location;
        }
    }

    public function saveDocs(Request $request)
    {


        $name = $request->input('doc_name');
        $img_id = 'doc_file';
        $image_path = $this->saveFile($request, $img_id);
        $result = array(
            "name" => $name,
            "path" => $image_path
        );
        $response = json_encode($result);
        return $response;
    }

    public function saveFile($request, $id)
    {
        if ($request->hasFile($id)) {
            $image = $request->file($id);

            $name =  time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = base_path('images/download');
            $image->move($destinationPath, $name);
            $image_location = "images/download/" . $name;

            return $image_location;
        }
    }

    public function saveImgs(Request $request)
    {



        $img_id = 'doc_image';
        $image_path = $this->saveImgFile($request, $img_id);
        $result = array(
            "path" => $image_path
        );
        $response = json_encode($result);
        return $response;
    }

    public function saveImgFile($request, $id)
    {
        if ($request->hasFile($id)) {
            $image = $request->file($id);

            $lead_name = time();
            $name = $lead_name . '.' . $image->getClientOriginalExtension();


            $destinationPath = base_path('images/img');
            $image->move($destinationPath, $name);
            $image_location = "images/img/" . $name;

            return $image_location;
        }
    }
}
