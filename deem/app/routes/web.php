<?php

use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', 'HomeController@landingPage');
Route::get('about-us', 'HomeController@aboutUs');
Route::get('services', 'HomeController@services');
Route::get('blog', 'HomeController@blog');
Route::get('portfolio', 'HomeController@portfolio');
Route::get('career', 'HomeController@career');
Route::get('packages', 'HomeController@packages');
Route::get('testimonial', 'HomeController@testimonial');
Route::get('instagram', 'HomeController@instagram');
Route::get('privacy-policy', 'HomeController@privacyPolicy');
Route::get('terms-condition', 'HomeController@termsCondition');




Route::get('company-profile', 'HomeController@companyProfile');

Route::get('blog-detail', 'HomeController@blogDetail');
Route::get('product-detail', 'HomeController@productDetail');

Route::get('project', 'HomeController@project');
Route::get('product', 'HomeController@product');
Route::get('contact-us', 'HomeController@contactUs');
Route::get('contractor', 'HomeController@contractor');
Route::get('general_contractor', 'HomeController@generalContractor');
Route::get('maintenance', 'HomeController@maintenance');
Route::post('save_contact', 'HomeController@Contact');
Route::post('home_contact', 'HomeController@homeContact');




Route::get('product_listing/{id}', 'HomeController@productListing');
Route::get('project_detail', 'HomeController@getContent');


Route::get('{name}', 'HomeController@getContent')->where('name', '.*');
