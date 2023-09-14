<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model {

    protected $table = 'portfolio_images';

    public static function store($content_id, $images, $user_id) {
        self::deleteImages($content_id);

        foreach ($images as $item) {
            $content = new PortfolioImage();
            $content->fourth_layer_id = $content_id;
            $content->image_path = $item["image_path"];
            $content->image_title = $item["image_title"];
            $content->created_by = $user_id;
            $content->save();
        }
        return 1;
    }

    public static function getImages($content_id) {
        $content = self::where('fourth_layer_id', $content_id)->get();
        return $content;
    }

    public static function getAll() {
        $content = self::orderBy('id', 'DESC')->get();
        return $content;
    }

    public static function deleteImages($content_id) {
        $content = self::where('fourth_layer_id', $content_id);
        $content->delete();
    }

}
