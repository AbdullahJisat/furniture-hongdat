<?php

namespace App\Http\Controllers;

use App\EndPointUrl\EndPointUrl;
use App\CustomClasses\CurlRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function landingPage()
    {
        $end_point_url = new EndPointUrl();
        $api_landing_page_url = $end_point_url::$landing_page_url;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_landing_page_url);

        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $landing_page_response = $response['response'];
            } else {
                $landing_page_response = "";
            }
        } catch (\Exception $e) {
            $landing_page_response = "";
        }
        $api_url = $end_point_url::$api_base_url;

        return view('home', ['response' => $landing_page_response, 'api_url' => $api_url]);
    }

    public function aboutUs()
    {

        $end_point_url = new EndPointUrl();
        $api_blog_url = $end_point_url::$blog_url;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_blog_url);

        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $blogs = $response['response'];
            } else {
                $blogs = "";
            }
        } catch (\Exception $e) {
            $blogs = "";
        }

        $api_url = $end_point_url::$api_base_url;
        return view('about_us', ['response' => $blogs, 'api_url' => $api_url]);
    }

    public function customFurniture()
    {

        $end_point_url = new EndPointUrl();
        $api_blog_url = $end_point_url::$blog_url;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_blog_url);

        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $blogs = $response['response'];
            } else {
                $blogs = "";
            }
        } catch (\Exception $e) {
            $blogs = "";
        }

        $api_url = $end_point_url::$api_base_url;
        return view('custom_furniture', ['response' => $blogs, 'api_url' => $api_url]);
    }
    public function maintenance()
    {
        $end_point_url = new EndPointUrl();
        $api_blog_url = $end_point_url::$blog_url;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_blog_url);

        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $blogs = $response['response'];
            } else {
                $blogs = "";
            }
        } catch (\Exception $e) {
            $blogs = "";
        }

        $api_url = $end_point_url::$api_base_url;
        return view('maintenance', ['response' => $blogs, 'api_url' => $api_url]);
    }
    public function fitoutDecoration()
    {
        $end_point_url = new EndPointUrl();
        $api_blog_url = $end_point_url::$blog_url;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_blog_url);

        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $blogs = $response['response'];
            } else {
                $blogs = "";
            }
        } catch (\Exception $e) {
            $blogs = "";
        }

        $api_url = $end_point_url::$api_base_url;
        return view('fitout_decoration', ['response' => $blogs, 'api_url' => $api_url]);
    }

    public function companyProfile()
    {
        $end_point_url = new EndPointUrl();
        $api_about_us_url = $end_point_url::$about_us;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_about_us_url);

        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $about_us_response = $response['response'];
            } else {
                $about_us_response = "";
            }
        } catch (\Exception $e) {
            $about_us_response = "";
        }
        $api_url = $end_point_url::$api_base_url;
        return view('company_profile', ['response' => $about_us_response, 'api_url' => $api_url]);
    }

    public function product()
    {

        $end_point_url = new EndPointUrl();
        $api_about_us_url = $end_point_url::$product_url;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_about_us_url);


        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $about_us_response = $response['response'];
            } else {
                $about_us_response = "";
            }
        } catch (\Exception $e) {
            $about_us_response = "";
        }

        $api_url = $end_point_url::$api_base_url;
        return view('product_listing', ['response' => $about_us_response, 'api_url' => $api_url]);
    }

    public function blog()
    {

        $end_point_url = new EndPointUrl();
        $api_blog_url = $end_point_url::$blog_url;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_blog_url);

        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $blogs = $response['response'];
            } else {
                $blogs = "";
            }
        } catch (\Exception $e) {
            $blogs = "";
        }

        $api_url = $end_point_url::$api_base_url;
        // dd($blogs);
        return view('blog', ['response' => $blogs, 'api_url' => $api_url]);
    }

    public function contactUs()
    {

        $end_point_url = new EndPointUrl();
        $api_contact_us_url = $end_point_url::$contact_us_url;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_contact_us_url);

        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $contacts = $response['response'];
            } else {
                $contacts = "";
            }
        } catch (\Exception $e) {
            $contacts = "";
        }
        $api_url = $end_point_url::$api_base_url;
        return view('contact_us', ['response' => $contacts, 'api_url' => $api_url]);
    }

    public function getContent($name)
    {

        $end_point_url = new EndPointUrl();
        $api_content_url = $end_point_url::$content_url;

        $post = [
            'name' => $name
        ];

        $curl_request = new CurlRequest();
        $output = $curl_request->postRequest($api_content_url, $post);


        try {
            $response = json_decode($output, true);
            $type = $response['type'];


            if ($response['status']) {
                $result = $response['response'];
                $type = $response['type'];
            } else {
                $result = "";
            }
        } catch (\Exception $e) {
            $result = "";
        }


        if (!empty($result)) {
            $api_url = $end_point_url::$api_base_url;
            if ($type == 1) {
                return view('service_detail', ['response' => $result, 'api_url' => $api_url]);
            } else if ($type == 2) {

                return view('blog_detail', ['response' => $result, 'api_url' => $api_url]);
            } else if ($type == 6) {
                return view('product_detail', ['response' => $result, 'api_url' => $api_url]);
            }
        } else {
            return redirect('/');
        }
    }

    public function Contact(Request $request)
    {


        $end_point_url = new EndPointUrl();
        $api_contact_url = $end_point_url::$contact_us_url;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_contact_url);
        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $contacts = $response['response'];
            } else {
                $contacts = "";
            }
        } catch (\Exception $e) {
            $contacts = "";
        }

        if (isset($contacts[0]) && !empty($contacts[0])) {
            $admin_email = $contacts[0]['email'];
            $from = $contacts[0]['email'];
        } else {
            $admin_email = "sales.hongdat@gmail.com";
            $from = "sales.hongdat@gmail.com";
        }

        $subject = 'Enquiry from Hongdat contact form.';

        try {
            $name = $request->input('name');
            $email = $request->input('email');
            $sub = $request->input('subject');
            $enquiry = $request->input('message');

            $this->sendEmail($name, $email, $enquiry, $admin_email, $subject, $email, $sub);
            return redirect('contact-us')->with('message', 'Thank you, You have successfully submitted your enquiry, We will get back to you soon!');
        } catch (\Exception $e) {
            return redirect('contact-us')->with('error', 'Something went wrong, please try again later.local error');
        }
    }

    public function homeContact(Request $request)
    {


        $end_point_url = new EndPointUrl();
        $api_contact_url = $end_point_url::$contact_us_url;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_contact_url);
        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $contacts = $response['response'];
            } else {
                $contacts = "";
            }
        } catch (\Exception $e) {
            $contacts = "";
        }

        if (isset($contacts[0]) && !empty($contacts[0])) {
            $admin_email = $contacts[0]['email'];
            $from = $contacts[0]['email'];
        } else {
            $admin_email = "sales.hongdat@gmail.com";
            $from = "sales.hongdat@gmail.com";
        }

        $subject = 'Enquiry from Hongdat contact form.';

        try {
            $name = $request->input('name');
            $email = $request->input('email');
            $sub = $request->input('subject');
            $enquiry = $request->input('message');

            $this->sendEmail($name, $email, $enquiry, $admin_email, $subject, $email, $sub);
            return redirect('/')->with('message', 'Thank you, You have successfully submitted your enquiry, We will get back to you soon!');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Something went wrong, please try again later.local error');
        }
    }

    public function sendEmail($name, $email, $enquiry, $admin_email, $subject, $from, $sub)
    {


        $email_text = '
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                <meta name="format-detection" content="telephone=no" />
                <title>Joydom - Conatct Us</title>

                </head>
                <body bgcolor="#E1E1E1" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
                    <span class="" style="
                          font-size:1px;
                          color:#ffffff;
                          line-height:1px;
                          max-height:0px;
                          max-width:0px;
                          opacity:0;
                          overflow:hidden;">(User has submitted new enquiry form from Hongdat website. Client waiting for your response!)</span>

                    <center style="background-color:#E1E1E1;">
                        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;">
                            <tr>
                                <td align="center" valign="top" id="bodyCell">


                                    <table bgcolor="#FFFFFF"  border="0" cellpadding="0" cellspacing="0" width="500" id="emailBody">


                                        <tr>
                                            <td align="center" valign="top">

                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="color:#FFFFFF;" bgcolor="#3498db">
                                                    <tr>
                                                        <td align="center" valign="top">

                                                            <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                                                <tr>
                                                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">

                                                                        <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                                                            <tr>
                                                                                <td align="center" valign="top" class="textContent">


                                                                                    <h1 style="color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;">Enquiry</h1>

                                                                                </td>
                                                                            </tr>
                                                                        </table>


                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>





                                        <tr>
                                            <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F8F8F8">
                                                    <tr>
                                                        <td align="center" valign="top">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                                                <tr>
                                                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                                                        <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                                                            <tr>
                                                                                <td align="center" valign="top">

                                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                        <tr>
                                                                                            <td valign="top" class="textContent">

                                                                                                <?php
                                                                                                if (!empty($name)) {
                                                                                                    ?>
                                                                                                    <h3 mc:edit="header" style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;"> Name </h3>
                                                                                                    <div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">' . $name . '</div><br />
                                                                                                    <?php
                                                                                                }
                                                                                                if (!empty($email)) {
                                                                                                    ?>
                                                                                                    <h3 mc:edit="header" style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;"> Email </h3>
                                                                                                    <div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">' . $email . '</div><br />
                                                                                                    <?php
                                                                                                }

                                                                                                 if (!empty($sub)) {
                                                                                                    ?>
                                                                                                    <h3 mc:edit="header" style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;"> Subject </h3>
                                                                                                    <div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">' . $sub . '</div><br />
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>

                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td align="center" valign="top">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                                                <tr>
                                                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                                                        <table class="flexibleContainerCellDivider" border="0" cellpadding="30" cellspacing="0" width="100%">
                                                                            <tr>
                                                                                <td align="center" valign="top" style="padding-top:0px;padding-bottom:0px;">


                                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                        <tr>
                                                                                            <td align="center" valign="top" style="border-top:1px solid #C8C8C8;"></td>
                                                                                        </tr>
                                                                                    </table>


                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>





                                        <tr>
                                            <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#F8F8F8">
                                                    <tr>
                                                        <td align="center" valign="top">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                                                <tr>
                                                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                                                        <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                                                            <tr>
                                                                                <td align="center" valign="top">

                                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                        <tr>
                                                                                            <td valign="top" class="textContent">

                                                                                                <?php
                                                                                                if (!empty($enquiry)) {
                                                                                                    ?>
                                                                                                    <h3 mc:edit="header" style="color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;"> Enquiry </h3>
                                                                                                    <div mc:edit="body" style="text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;">' . $enquiry . '</div>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>


                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>


                                    </table>

                                    <table bgcolor="#E1E1E1" border="0" cellpadding="0" cellspacing="0" width="500" id="emailFooter">

                                        <tr>
                                            <td align="center" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td align="center" valign="top">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="500" class="flexibleContainer">
                                                                <tr>
                                                                    <td align="center" valign="top" width="500" class="flexibleContainerCell">
                                                                        <table border="0" cellpadding="30" cellspacing="0" width="100%">
                                                                            <tr>
                                                                                <td valign="top" bgcolor="#E1E1E1">

                                                                                    <div style="font-family:Helvetica,Arial,sans-serif;font-size:13px;color:#828282;text-align:center;line-height:120%;">
                                                                                        <p> Copyright <?php echo date("Y"); ?> @ HONG DAT TECHNICAL WORKS LLC(Powered by <a href="https://appzgate.com/">Appzgate</a></span> Solutions Pte Ltd)</p>
                                                                                    </div>

                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        </td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>

                                    </table>


                                </td>
                            </tr>
                        </table>
                    </center>
                </body>
                </html>';




        $headers = array(
            'Content-Type: text/html; charset="UTF-8";',
            'From: ' . $from,
            'Reply-To: ' . $from,
            'Return-Path: ' . $from,
        );

        // Send email
        mail($admin_email, $subject, $email_text, implode("\n", $headers));





        //        Mail::send('email.contact_us', ['name' => $name, 'email' => $email, 'mobile' => $phone, 'enquiry' => $enquiry], function($message) use ($admin_email, $sender_name) {
        //            $message->to($admin_email, $sender_name)->subject('New Enquiry!');
        //        });
    }

    public function privacyPolicy()
    {

        $end_point_url = new EndPointUrl();
        $api_about_us_url = $end_point_url::$about_us;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_about_us_url);

        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $about_us_response = $response['response'];
            } else {
                $about_us_response = "";
            }
        } catch (\Exception $e) {
            $about_us_response = "";
        }

        return view('privacy_policy', ['response' => $about_us_response]);
    }

    public function termsCondition()
    {

        $end_point_url = new EndPointUrl();
        $api_about_us_url = $end_point_url::$about_us;

        $curl_request = new CurlRequest();
        $output = $curl_request->getRequest($api_about_us_url);

        try {
            $response = json_decode($output, true);

            if ($response['status']) {
                $about_us_response = $response['response'];
            } else {
                $about_us_response = "";
            }
        } catch (\Exception $e) {
            $about_us_response = "";
        }

        return view('terms_condition', ['response' => $about_us_response]);
    }
}
