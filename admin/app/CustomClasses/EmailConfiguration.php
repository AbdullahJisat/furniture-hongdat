<?php

namespace App\CustomClasses;

use Illuminate\Support\Facades\Config;

class EmailConfiguration {

    public static function setEmailConfiguration($mail) {
        $config = array(
            'driver' => 'smtp',
            'host' => $mail->mail_host,
            'port' => $mail->port,
            'from' => array('address' => $mail->sending_email, 'name' => $mail->sender_name),
            'encryption' => 'tls',
            'username' => $mail->sending_email,
            'password' => $mail->sending_email_password,
            'sendmail' => '/usr/sbin/sendmail -bs',
            'pretend' => false
        );
        Config::set('mail', $config);
    }

}
