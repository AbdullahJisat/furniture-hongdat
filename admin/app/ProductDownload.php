<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDownload extends Model {

    protected $table = 'product_downloads';

    public static function store($product_id, $images, $user_id) {
        self::deleteDownloads($product_id);

        foreach ($images as $item) {
            $download = new ProductDownload();
            $download->product_id = $product_id;
            $download->name = $item["name"];
            $download->download_url = $item["download_url"];
            $download->created_by = $user_id;
            $download->save();
        }
        return 1;
    }

    public static function getDownload($product_id) {
        $download = self::where('product_id', $product_id)->get();
        return $download;
    }

    public static function getAll() {
        $download = self::orderBy('id', 'DESC')->get();
        return $download;
    }

    public static function deleteDownloads($product_id) {
        $download = self::where('product_id', $product_id);
        $download->delete();
    }

}
