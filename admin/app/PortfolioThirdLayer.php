<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services;

class PortfolioThirdLayer extends Model {

    protected $table = 'portfolio_third_layer';

    public static function store($second_layer, $title, $description, $meta_title, $meta_keyword, $meta_description, $page_slug, $active, $user_id) {
        $third_layer = new PortfolioThirdLayer();
        $third_layer->second_layer_id = $second_layer;
        $third_layer->title = $title;
        $third_layer->description = $description;
        $third_layer->slug = $page_slug;
        $third_layer->meta_keyword = $meta_keyword;
        $third_layer->meta_description = $meta_description;
        $third_layer->meta_title = $meta_title;
        $third_layer->active = $active;
        $third_layer->created_by = $user_id;
        $third_layer->updated_by = $user_id;
        return $third_layer->save();
    }

    public static function edit($id, $second_layer, $title, $description, $meta_title, $meta_keyword, $meta_description, $page_slug, $active, $user_id) {
        $third_layer = self::find($id);
        $third_layer->second_layer_id = $second_layer;
        $third_layer->title = $title;
        $third_layer->description = $description;
        $third_layer->slug = $page_slug;
        $third_layer->meta_keyword = $meta_keyword;
        $third_layer->meta_description = $meta_description;
        $third_layer->meta_title = $meta_title;
        $third_layer->active = $active;
        $third_layer->updated_by = $user_id;
        return $third_layer->save();
    }

    public static function getAll() {
        $third_layer = self::join('portfolio_second_layer', 'portfolio_third_layer.second_layer_id', '=', 'portfolio_second_layer.id')
                        ->select('portfolio_third_layer.*', 'portfolio_second_layer.title as second_layer')
                        ->orderBy('id', 'DESC')->get();
        return $third_layer;
    }

    public static function getThirdLayer($id) {
        $third_layer = self::find($id);
        return $third_layer;
    }

    public static function getActiveThirdLayer() {

        $third_layer = self::where('active', 1)->get();
        return $third_layer;
    }

    public static function checkForExistance($name, $id = 0) {

        if ($id == 0) {
            $third_layer = self::where('title', $name)->count();
        } else {
            $third_layer = self::where('title', $name)->where('id', '!=', $id)->count();
        }
        return $third_layer;
    }

    public static function checkForAssinged($id) {
        if (Services::checkForCategoryAssigned($id) > 0) {
            return true;
        }
        return false;
    }

    public static function getThirdLayerBySlug($slug) {
        $third_layer = self::select('id')->where('slug', $slug)->first();
        if (!empty($third_layer)) {
            return $third_layer->id;
        } else {
            return "";
        }
    }

    public static function getActiveMenuThirdLayer($id) {

        $third_layer = self::select('title', 'id')->where('second_layer_id', $id)->where('active', 1)->get();
        return $third_layer;
    }

}
