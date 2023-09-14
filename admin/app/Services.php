<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ServicesCategory;

class Services extends Model {

    protected $table = 'services';

    public static function store($services_category_id, $name, $duration, $active, $user_id, $description, $price, $image_path, $slug) {
        $services = new Services();
        $services->services_categories_id = $services_category_id;
        $services->name = $name;
        $services->slug = $slug;
        $services->description = $description;
        $services->price = $price;
        $services->image_path = $image_path;
        $services->duration = $duration;
        $services->active = $active;
        if ($active) {
            $services->active_date_time = null;
        }
        $services->created_by = $user_id;
        $services->updated_by = $user_id;
        return $services->save();
    }

    public static function edit($id, $services_category_id, $name, $duration, $active, $active_time, $user_id, $description, $price, $image_path, $slug) {
        $services = self::find($id);
        $services->services_categories_id = $services_category_id;
        $services->name = $name;
        $services->slug = $slug;
        $services->description = $description;
        $services->price = $price;
        if ($image_path != "") {
            $services->image_path = $image_path;
        }
        $services->duration = $duration;
        $services->active = $active;
        if ($active_time != "") {
            $services->active_date_time = $active_time;
            $services->reactive = 1;
        } else {
            $services->active_date_time = null;
            $services->reactive = 0;
        }
        $services->updated_by = $user_id;
        return $services->save();
    }

    public static function getAll() {
        $services = self::join('services_categories', 'services.services_categories_id', '=', 'services_categories.id')->select('services.*', 'services_categories.name as service_category')->orderBy('services.id', 'DESC')->get();
        return $services;
    }

    public static function getService($id) {
        $services = self::join('services_categories', 'services.services_categories_id', '=', 'services_categories.id')->select('services.*', 'services_categories.name as service_category', 'services_categories.id as category_id')->where('services.id', $id)->first();
        return $services;
    }

    public static function checkForExistance($services_category_id, $name, $id = 0) {
        if ($id == 0) {
            $services = self::where('services_categories_id', $services_category_id)->where('name', $name)->count();
        } else {
            $services = self::where('services_categories_id', $services_category_id)->where('name', $name)->where('id', '!=', $id)->count();
        }
        return $services;
    }

    public static function getActiveServices() {
        $services = self::join('services_categories', 'services.services_categories_id', '=', 'services_categories.id')
                ->select('services.name as name', 'services.id as id', 'services.active', 'services_categories.active', 'services.price as price', 'services.services_categories_id as category_id')
                ->where('services_categories.active', 1)
                ->where('services.active', 1)
                ->get();
        return $services;
    }

    public static function checkForCategoryAssigned($category_id) {
        $services = self::where('services_categories_id', $category_id)->where('active', 1)->count();
        return $services;
    }

    public static function getServicesByCategory($category_id) {
        $services = self::select('id', 'name', 'description', 'duration', 'price', 'image_path', 'slug')
                        ->where('services_categories_id', $category_id)
                        ->where('active', 1)->get();
        return $services;
    }

    public static function getReactivateServices() {
        $now = date("Y-m-d h:i");
        $services = self::join('services_categories', 'services.services_categories_id', '=', 'services_categories.id')
                ->select('services.id')
                ->where('services.active', 0)
                ->where('services.reactive', 1)
                ->where('services_categories.active', 1)
                ->where('services.active_date_time', '<=', $now)
                ->get();
        return json_encode($services);
    }

    public static function reactivateService($id) {
        $services = self::find($id);
        $services->active = 1;
        $services->reactive = 0;
        $services->updated_by = 0;
        return $services->save();
    }

    public static function getServiceBySlug($slug) {
        $services = self::where('slug', $slug)->first();
        if (!empty($services)) {
            $services->category = ServicesCategory::getServiceCategory($services->services_categories_id);
        }
        return $services;
    }

    public static function getHandymanServicesByCategory($category_id) {
        $services = self::select('id', 'name')
                        ->where('services_categories_id', $category_id)
                        ->where('active', 1)->get();
        return $services;
    }

    public static function getHandymanServices() {
        $services = self::join('services_categories', 'services.services_categories_id', '=', 'services_categories.id')
                ->select('services.name as name', 'services.id as id', 'services.services_categories_id as category_id')
                ->where('services_categories.active', 1)
                ->where('services.active', 1)
                ->get();
        return $services;
    }

    public static function deleteService($id) {
        try {
            $service = self::find($id);
            $service->delete();
        } catch (\Exception $ex) {
            return 0;
        }
        return 1;
    }
    
    public static function serviceCount($category_id){
        $services = self::where('services_categories_id', $category_id)->count();
        return $services;
    }

}
