<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Support\Facades\Hash;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public static function store($employee_id, $name, $password, $active, $user_id, $email, $mobile) {
        $user = new User();
        $user->employee_id = $employee_id;
        $user->name = $name;
        $user->email = $email;
        $user->mobile = $mobile;
        $user->password = Hash::make($password);
        $user->active = $active;
        $user->created_by = $user_id;
        $user->updated_by = $user_id;
        return $user->save();
    }

    public static function edit($id, $employee_id, $name, $password, $active, $user_id, $email, $mobile) {
        $user = self::find($id);
        $user->employee_id = $employee_id;
        $user->name = $name;
        $user->email = $email;
        $user->mobile = $mobile;
        if (!empty($password)) {
            $user->password = Hash::make($password);
        }

        $user->active = $active;
        $user->updated_by = $user_id;
        return $user->save();
    }

    public static function getAll() {
        $user = self::orderBy('id', 'DESC')->get();
        return $user;
    }

    public static function getUser($id) {
        $user = self::find($id);
        return $user;
    }

    public static function getActiveUsers() {
        $user = self::where('active', 1)->get();
        return $user;
    }

    public static function checkforExistance($employee_id, $id = 0) {
        if ($id == 0) {
            $user = self::where('employee_id', $employee_id)->count();
        } else {
            $user = self::where('employee_id', $employee_id)->where('id', '!=', $id)->count();
        }

        return $user;
    }

}
