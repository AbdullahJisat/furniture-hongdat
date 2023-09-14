<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentMenu extends Model {

    protected $table = 'content_menu';

    public static function getAll() {
        $menu = self::select('id', 'name')->orderBy('id', 'DESC')->where('active', 1)->get();
        foreach ($menu as $m) {
            $m->mid = (int) $m->id;
        }
        return $menu;
    }

}
