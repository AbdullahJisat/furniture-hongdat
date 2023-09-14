<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slug extends Model {

    protected $table = 'slugs';

    public static function store($name, $type, $user_id, $active) {
        $slug = new Slug();
        $slug->slug = $name;
        $slug->type = $type;
        $slug->active = $active;
        $slug->created_by = $user_id;
        $slug->updated_by = $user_id;
        return $slug->save();
    }

    public static function edit($old_name, $name, $type, $user_id) {
        try {
            self::where('slug', $old_name)->update(['slug' => $name, 'type' => $type, 'updated_by' => $user_id]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function promoEdit($old_name, $name, $type, $user_id) {
        if (empty($old_name)) {
            self::store($name, $type, $user_id, 1);
        } else {
            self::edit($old_name, $name, $type, $user_id);
        }
    }

    public static function getAll() {
        $slug = self::all();
        return $slug;
    }

    public static function getSlug($id) {
        $slug = self::find($id);
        return $slug;
    }

    public static function getSlugByName($name) {
        $slug = self::where('slug', $name)->where('active', 1)->select('type')->first();
        if (!empty($slug)) {
            return $slug->type;
        } else {
            return "";
        }
    }

    public static function getActiveSlug() {
        $slug = self::select('slug', 'type')
                ->where('active', 1)
                ->get();
        return $slug;
    }

    public static function isExists($name) {
        $slug = self::where('slug', $name)->count();
        return $slug;
    }

}
