<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ContactUs extends Model {

    protected $table = 'contact_us';

    public static function edit($id, $showroom_address, $factory_address, $email, $phone, $mobile, $fax, $user_id) {

        $contact_us = self::find($id);
        $contact_us->showroom_address = $showroom_address;
        $contact_us->factory_address = $factory_address;
        $contact_us->email = $email;
        $contact_us->phone = $phone;
        $contact_us->mobile = $mobile;
        $contact_us->fax = $fax;
        $contact_us->updated_by = $user_id;
        return $contact_us->save();
    }

    public static function getAll() {
        $contact_us = self::all();
        return $contact_us;
    }

    public static function getContactUs($id) {
        $contact_us = self::find($id);
        return $contact_us;
    }

    public static function getActiveContactUs() {
        $contact_us = self::select('email', 'phone', 'showroom_address', 'factory_address', 'mobile', 'fax')
                ->first();
        return $contact_us;
    }

}
