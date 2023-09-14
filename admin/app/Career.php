<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model {

    protected $table = 'careers';

    public static function store($position, $application_email, $expiry_date, $description, $active, $user_id) {
        $career = new Career();
        $career->position = $position;
        $career->application_email = $application_email;
        $career->expiry_date = $expiry_date;
        $career->description = $description;
        $career->active = $active;
        $career->created_by = $user_id;
        $career->updated_by = $user_id;
        return $career->save();
    }

    public static function edit($id, $position, $application_email, $expiry_date, $description, $active, $user_id) {
        $career = self::find($id);
        $career->position = $position;
        $career->application_email = $application_email;
        $career->expiry_date = $expiry_date;
        $career->description = $description;
        $career->active = $active;
        $career->updated_by = $user_id;
        return $career->save();
    }

    public static function getAll() {
        $careers = self::orderBy('id', 'DESC')->get();
        return $careers;
    }

    public static function getActiveCareers() {
        $careers = self::select('position', 'application_email', 'expiry_date', 'description')
                        ->where('active', 1)
                        ->where('expiry_date', '>', \DB::raw('NOW()'))
                        ->orderBy('id', 'DESC')->get();
        return $careers;
    }

    public static function getCareer($id) {
        $career = self::find($id);
        return $career;
    }

}
