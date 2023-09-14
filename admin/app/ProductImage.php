<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model {

    protected $table = 'product_images';

    public static function store($product_id, $images, $user_id) {
        self::deleteImages($product_id);

        foreach ($images as $item) {
            $content = new ProductImage();
            $content->product_id = $product_id;
            $content->image_url = $item["image_url"];
            $content->created_by = $user_id;
            $content->save();
        }
        return 1;
    }

    public static function getImages($product_id) {
        $content = self::where('product_id', $product_id)->get();
        return $content;
    }

    public static function getAll() {
        $content = self::orderBy('id', 'DESC')->get();
        return $content;
    }

    public static function deleteImages($product_id) {
        $content = self::where('product_id', $product_id);
        $content->delete();
    }

}
