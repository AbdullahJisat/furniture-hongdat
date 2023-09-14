<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\CustomClasses\Validation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\PortalNotification;
use App\Cases;
use App\Order;
use App\Offer;

class AdminController extends Controller {

    // admin login view
    public function login() {

        return redirect('/admin');
    }

    public function adminLogin() {

        return view('Admin.admin_login');
    }

    //Check admin login
    public function checkLogin(Request $request) {

        //ErrorMessage
        $errorMessage = "";
        //Get the username
        $userName = $request->username;
        //Get the password
        $password = $request->password;
        //Check for empty validation 
        $validation = new Validation();
        if ($validation->loginFormValidation($userName, $password)) {
            //Authentication Check
            if (Auth::attempt(['employee_id' => $userName, 'password' => $password, 'active' => 1])) {
                //Login Success
                return redirect('admin_dashboard');
            } else {
                //Login Failed
                $errorMessage = "Authentication Failed, check your username and password";
                return redirect('/admin')->with('status', $errorMessage);
            }
        } else {
            //Validation Error
            $errorMessage = "Enter any username and password.";
            return redirect('/admin')->with('status', $errorMessage);
        }
    }

    //Admin Dashboard View
    public function dashboard() {
        return view('Admin.admin_dashboard');
    }

    public function adminLoginCheck() {
        if (!\Auth::check()) {
            return 0;
        }
        return 1;
    }

    public function adminNotification() {
        $notifications = PortalNotification::adminNotification();
        $notification_count = PortalNotification::notificationCount();
        $new_enquiry = array();
        $new_chat = array();
        $new_order = array();
        $cancel_order = array();
        $pending_count = array();

        $response_array = array();
        $notification_array = array();
        $notification_id_array = array();
        $new_notification_array = array();
        $desktop_notification = array();
        if (!empty($notifications)) {
            foreach ($notifications as $notification) {
                PortalNotification::updateNotification($notification->id);
                array_push($notification_id_array, $notification->id);
                $content = "";
                $ref_id = "";


                if ($notification->enquiry_notification == 1) {
                    $new_notification = "New Enquiry";
                    $content = $notification->content;
                    $ref_id = $notification->ref_id;
                    $type = 1;
                } else if ($notification->chat_notification == 1) {
                    $new_notification = "New Message";
                    $type = 2;
                    $content = $notification->content;
                    if (strlen($notification->content) > 49) {
                        $content = substr($notification->content, 0, 49) . '...';
                    }
                    $ref_id = $notification->ref_id;
                } else if ($notification->order_notification == 1) {
                    $new_notification = "New Order";
                    $content = $notification->content;
                    $type = 3;
                    $ref_id = $notification->ref_id;
                } else if ($notification->order_cancellation_notification == 1) {
                    $new_notification = "Order Cancel";
                    $content = $notification->content;
                    $type = 3;
                    $ref_id = $notification->ref_id;
                }
                $notification_time = $this->getNotificationTime($notification->created_at);

                if ($notification->status == 0) {
                    $desktop_type = 0;
                    if ($notification->enquiry_notification == 1) {
                        $desktop_type = 1;
                    } else if ($notification->chat_notification == 1) {
                        $desktop_type = 2;
                    } else if ($notification->order_notification == 1) {
                        $desktop_type = 3;
                    } else if ($notification->order_cancellation_notification == 1) {
                        $desktop_type = 4;
                    }
                    array_push($desktop_notification, $desktop_type);
                }



                PortalNotification::updateNotification($notification->id);

                $new_notification = array($new_notification, $notification_time, $type, $content, $ref_id);
                array_push($new_notification_array, $new_notification);
            }
        }
        $pending_cases_count = Cases::allViewedCaseCount();
        $pending_order_count = Order::allPendingOrderCount();
        $pending_offer_count = Offer::allPendingOfferCount();
        array_push($pending_count, $pending_cases_count, $pending_order_count, $pending_offer_count);

        array_push($notification_array, $notification_count, $new_notification_array);
        array_push($response_array, $notification_array, $notification_id_array, $desktop_notification, $pending_count);
        return json_encode($response_array);
    }

    public function getNotificationTime($notification_time) {
        $to_time = strtotime($notification_time);
        $time = round(abs($to_time - time()) / 60);

        if ($time > 60) {
            $time = round(abs($to_time - time()) / 60 / 60);
            $no_time = $time . " hrs";
        } else {
            if ($time == 0) {
                $no_time = "just now";
            } elseif ($time == 1) {
                $no_time = $time . " min";
            } else {
                $no_time = $time . " mins";
            }
        }

        return $no_time;
    }

    public function updateNotification(Request $request) {

        $id = $request->id;
        $notification_ids = explode(",", $id);
        foreach ($notification_ids as $notification_id) {
            PortalNotification::updateReadNotification($notification_id);
        }
        //  PortalNotification::updateReadNotification($notification_id);
    }

    public function logout() {
        auth()->logout();
        Session::flush();
        return redirect('/admin');
    }

    //
}
