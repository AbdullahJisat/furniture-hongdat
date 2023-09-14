<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductImage;
use App\ProductDownload;

class Product extends Model {

    protected $table = 'products';

    public static function store($category_id, $title, $description, $meta_title, $meta_keyword, $meta_description, $image_path, $image_title, $alt_tag, $page_slug, $more_images, $downloads, $active, $user_id, $features, $content, $specifications) {
        $product = new Product();
        $product->category_id = $category_id;
        $product->title = $title;
        $product->slug = $page_slug;
        $product->description = $description;
        $product->meta_keyword = $meta_keyword;
        $product->meta_description = $meta_description;
        $product->meta_title = $meta_title;
        $product->image_path = $image_path;
        $product->image_title = $image_title;
        $product->image_alt = $alt_tag;
        $product->specs = $specifications;
        $product->content = $content;
        $product->features = $features;
        $product->active = $active;
        $product->created_by = $user_id;
        $product->updated_by = $user_id;
        if ($product->save()) {
            $product_id = $product->id;

            if ($more_images != null) {
                ProductImage::store($product_id, $more_images, $user_id);
            }
            if ($downloads != null) {
                ProductDownload::store($product_id, $downloads, $user_id);
            }
        }
        return 1;
    }

    public static function edit($id, $category_id, $title, $description, $meta_title, $meta_keyword, $meta_description, $image_path, $image_title, $alt_tag, $more_images, $downloads, $page_slug, $active, $user_id, $features, $content, $specifications) {
        $product = self::find($id);
        $product->category_id = $category_id;
        $product->title = $title;
        $product->slug = $page_slug;
        $product->description = $description;
        $product->meta_keyword = $meta_keyword;
        $product->meta_description = $meta_description;
        $product->meta_title = $meta_title;
        if ($image_path != "") {
            $product->image_path = $image_path;
        }
        $product->image_title = $image_title;
        $product->image_alt = $alt_tag;
        $product->content = $content;
        $product->specs = $specifications;
        $product->features = $features;
        $product->active = $active;
        $product->updated_by = $user_id;
        if ($product->save()) {
            if ($downloads != null) {
                ProductDownload::store($id, $downloads, $user_id);
            }
            if ($more_images != null) {
                ProductImage::store($id, $more_images, $user_id);
            }
        }
        return true;
    }

    public static function getAll() {
        $product = self::join('category', 'products.category_id', '=', 'category.id')
                        ->select('products.*', 'category.title as category_name')
                        ->orderBy('id', 'DESC')->get();
        return $product;
    }

    public static function getProduct($id) {
        $product = self::find($id);
        if (!empty($product)) {
            $product->downloads = ProductDownload::getDownload($id);
            $product->image = ProductImage::getImages($id);
        }
        return $product;
    }

    public static function getActiveProduct() {

        $product = self::join('category', 'products.category_id', '=', 'category.id')
                        ->select('products.*', 'category.title as category_name')
                        ->orderBy('products.id', 'DESC')->where('products.active', 1)->get();
        return $product;
    }

    public static function checkForExistance($name, $id = 0) {

        if ($id == 0) {
            $product = self::where('title', $name)->count();
        } else {
            $product = self::where('title', $name)->where('id', '!=', $id)->count();
        }
        return $product;
    }

    public static function checkForAssinged($id) {
        if (Services::checkForCategoryAssigned($id) > 0) {
            return true;
        }
        return false;
    }

    public static function getProductBySlug($slug) {
        $product = self::where('slug', $slug)->first();
        if (!empty($product)) {
            $id = $product->id;
            $product->downloads = ProductDownload::getDownload($id);
            $product->image = ProductImage::getImages($id);
        }
        return $product;
    }

    public static function getActiveMenuFourthLayer($id) {
        $product = self::select('id', 'title', 'slug')->where('third_layer_id', $id)->where('active', 1)->get();
        return $product;
    }

    public static function getByThirdLayer($id) {
        $product = self::select('id', 'title', 'slug', 'image_path')->where('third_layer_id', $id)->orderBy('id', 'DESC')->get();
        return $product;
    }

}
