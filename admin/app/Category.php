<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PortfolioThirdLayer;
use App\PortfolioFourthLayer;

class Category extends Model
{

    protected $table = 'category';

    public static function store($title, $description, $meta_title, $meta_keyword, $meta_description, $image_path, $image_title, $alt_tag, $page_slug, $active, $user_id, $type)
    {
        $category = new Category();
        $category->title = $title;
        $category->type = $type;
        $category->description = $description;
        $category->slug = $page_slug;
        $category->meta_keyword = $meta_keyword;
        $category->meta_description = $meta_description;
        $category->meta_title = $meta_title;
        $category->image_path = $image_path;
        $category->image_title = $image_title;
        $category->image_alt = $alt_tag;
        $category->active = $active;
        $category->created_by = $user_id;
        $category->updated_by = $user_id;
        return $category->save();
    }

    public static function edit($id, $title, $description, $meta_title, $meta_keyword, $meta_description, $image_path, $image_title, $alt_tag, $page_slug, $active, $user_id, $type)
    {
        $category = self::find($id);
        $category->title = $title;
        $category->type = $type;
        $category->description = $description;
        $category->slug = $page_slug;
        $category->meta_keyword = $meta_keyword;
        $category->meta_description = $meta_description;
        $category->meta_title = $meta_title;
        if ($image_path != "") {
            $category->image_path = $image_path;
        }
        $category->image_title = $image_title;
        $category->image_alt = $alt_tag;
        $category->active = $active;
        $category->updated_by = $user_id;
        return $category->save();
    }

    public static function getAll()
    {
        $category = self::orderBy('id', 'DESC')->get();
        return $category;
    }
    public static function getBlogCategory()
    {
        $category = self::orderBy('id', 'DESC')->where('type', 'Blog')->get();
        return $category;
    }

    public static function getCategory($id)
    {
        $category = self::find($id);
        return $category;
    }

    public static function getActiveCategory()
    {

        $category = self::select('id', 'title', 'slug', 'image_path', 'image_alt')->where('active', 1)->where('type', 'Product')->limit(5)->orderBy('id', 'DESC')->get();
        return $category;
    }
    public static function getActiveBlogCategory()
    {

        $category = self::select('id', 'title', 'slug', 'image_path', 'image_alt')->where('active', 1)->where('type', 'Blog')->limit(5)->orderBy('id', 'DESC')->get();
        return $category;
    }

    public static function getActiveAllCategory()
    {

        $category = self::select('id', 'title', 'slug', 'image_path', 'image_alt')->where('active', 1)->where('type', 'Product')->orderBy('id', 'DESC')->get();
        return $category;
    }

    public static function checkForExistance($name, $id = 0)
    {

        if ($id == 0) {
            $category = self::where('title', $name)->count();
        } else {
            $category = self::where('title', $name)->where('id', '!=', $id)->count();
        }
        return $category;
    }

    //    public static function checkForAssinged($id) {
    //        if (Services::checkForCategoryAssigned($id) > 0) {
    //            return true;
    //        }
    //        return false;
    //    }

    public static function getSecondLayerBySlug($slug)
    {
        $category = self::select('id')->where('slug', $slug)->first();
        if (!empty($category)) {
            $second_id = $category->id;
            $third_layer = PortfolioThirdLayer::select('title', 'id')->where('active', 1)->where('second_layer_id', $second_id)->orderBy('id', 'DESC')->get();
            foreach ($third_layer as $third) {
                $fourth_layer = PortfolioFourthLayer::getByThirdLayer($third->id);
                $third->fourth_layer = $fourth_layer;
            }
            return $third_layer;
        } else {
            return "";
        }
    }

    public static function getActiveMenuPortfolios()
    {
        $category = self::select('name', 'id')->where('active', 1)->get();
        if (!empty($category)) {
            $third_layer = "";
            foreach ($category as $second) {
                $third_layer = PortfolioThirdLayer::getActiveMenuThirdLayer($second->id);

                $second->third_layer = $third_layer;

                if (!empty($third_layer)) {
                    $fourth_layer = "";
                    foreach ($third_layer as $third) {
                        $fourth_layer = PortfolioFourthLayer::getActiveMenuFourthLayer($third->id);
                        $second->fourth_layer = $fourth_layer;
                    }
                }
            }
        }

        return $category;
    }
}
