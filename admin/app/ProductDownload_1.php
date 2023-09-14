<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDownload extends Model {

    protected $table = 'product_downloads';

    public static function store($fifth_layer_id, $images, $user_id) {
        self::deleteDownloads($fifth_layer_id);

        foreach ($images as $item) {
            $download = new ProductDownload();
            $download->fifth_layer_id = $fifth_layer_id;
            $download->name = $item["name"];
            $download->download_url = $item["download_url"];
            $download->created_by = $user_id;
            $download->save();
        }
        return 1;
    }

    public static function getDownload($fifth_layer_id) {
        $download = self::where('fifth_layer_id', $fifth_layer_id)->get();
        return $download;
    }

    public static function getAll() {
        $download = self::orderBy('id', 'DESC')->get();
        return $download;
    }

    public static function deleteDownloads($fifth_layer_id) {
        $download = self::where('fifth_layer_id', $fifth_layer_id);
        $download->delete();
    }

}
