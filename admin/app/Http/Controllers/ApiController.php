<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use App\Slug;
use App\Category;
use App\Content;
use App\Product;

class ApiController extends Controller
{

    public function getLandingPage()
    {

        $landing_page = array();

        try {
            $status = 1;
            $contact_us = ContactUs::getActiveContactUs();
            $slider = Content::getActiveSlider();
            $category = Category::getActiveCategory();
            $all_category = Category::getActiveAllCategory();

            array_push($landing_page, $contact_us, $category, $slider, $all_category);
        } catch (\Exception $e) {
            $status = 0;
            return $e;
        }

        $result = array(
            "status" => $status,
            "response" => $landing_page
        );
        $response = json_encode($result);
        return $response;
    }

    public function getBlogs()
    {
        $landing_page = array();
        try {
            $status = 1;
            $contact_us = ContactUs::getActiveContactUs();
            $category = Category::getActiveBlogCategory();
            $blogs = Content::getActiveBlogs();
            array_push($landing_page, $contact_us, $category, $blogs);
        } catch (\Exception $e) {
            $status = 0;
            echo $e->getMessage();
        }

        $result = array(
            "status" => $status,
            "response" => $landing_page
        );
        $response = json_encode($result);
        return $response;
    }

    public function getAboutUs()
    {
        $landing_page = array();
        try {
            $status = 1;
            $contact_us = ContactUs::getActiveContactUs();
            $category = Category::getActiveCategory();
            array_push($landing_page, $contact_us, $category);
        } catch (\Exception $e) {
            $status = 0;
        }

        $result = array(
            "status" => $status,
            "response" => $landing_page
        );
        $response = json_encode($result);
        return $response;
    }

    public function getContactUs()
    {
        $landing_page = array();
        try {
            $status = 1;
            $contact_us = ContactUs::getActiveContactUs();
            $category = Category::getActiveCategory();
            array_push($landing_page, $contact_us, $category);
        } catch (\Exception $e) {
            $status = 0;
        }

        $result = array(
            "status" => $status,
            "response" => $landing_page
        );
        $response = json_encode($result);
        return $response;
    }

    public function getProduct()
    {
        $landing_page = array();

        try {
            $status = 1;
            $contact_us = ContactUs::getActiveContactUs();
            $product = Product::getActiveProduct();
            $category = Category::getActiveCategory();
            $all_category = Category::getActiveAllCategory();
            array_push($landing_page, $contact_us, $product, $category, $all_category);
        } catch (\Exception $e) {
            $status = 0;
            $product = "";
        }

        $result = array(
            "status" => $status,
            "response" => $landing_page
        );
        $response = json_encode($result);
        return $response;
    }

    public function getContent(Request $request)
    {

        $landing_page = array();
        $status = 1;
        $custom = "";
        $name = $request->input('name');


        $type = Slug::getSlugByName($name);

        if (!empty($type)) {

            $contact_us = ContactUs::getActiveContactUs();
            $category = Category::getActiveBlogCategory();
            $blogs = Content::getActiveBlogs();
            if ($type == 2) {
                $status = 1;
                $response = Content::getBlogBySlug($name);
            } else if ($type == 6) {
                $status = 1;
                $response = Product::getProductBySlug($name);
            }
            array_push($landing_page, $contact_us, $category, $blogs, $response);
        }

        $result = array(
            "status" => $status,
            "response" => $landing_page,
            "type" => $type,
            "custom" => $custom
        );
        $response = json_encode($result);
        return $response;
    }
}
