<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTableContent extends Model {

    protected $table = 'product_table_content';

    public static function store($fourth_layer_id, $items, $user_id) {
        self::deleteTableContent($fourth_layer_id);

        foreach ($items as $item) {
            $content = new ProductTableContent();
            $content->fourth_layer_id = $fourth_layer_id;
            $content->model = $item["model"];
            $content->power = $item["power"];
            $content->flux = $item["flux"];
            $content->dimension = $item["dimension"];
            $content->created_by = $user_id;
            $content->save();
        }
        return 1;
    }

    public static function getTableContent($fourth_layer_id) {
        $content = self::where('fourth_layer_id', $fourth_layer_id)->get();
        return $content;
    }

    public static function getAll() {
        $content = self::orderBy('id', 'DESC')->get();
        return $content;
    }

    public static function deleteTableContent($fourth_layer_id) {
        $content = self::where('fourth_layer_id', $fourth_layer_id);
        $content->delete();
    }

}
