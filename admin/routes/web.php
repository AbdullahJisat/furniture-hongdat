<?php

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


//Admin Login

Route::get('/', 'AdminController@login');
Route::get('/admin', 'AdminController@adminLogin');
Route::get('/test', 'NavItemController@test');
Route::post('/check_login', 'AdminController@checkLogin');
Route::get('admin_dashboard', 'AdminController@dashboard');
Route::get('admin_logout', 'AdminController@logout');
Route::get('admin_login_check', 'AdminController@adminLoginCheck');
Route::get('user_details', 'AdminController@getUserDetails');
//Content
Route::post('save_content', 'ContentController@saveContent');
Route::get('get_all_content', 'ContentController@getAllContent');
Route::get('get_content', 'ContentController@getContent');
Route::post('edit_content', 'ContentController@editContent');
Route::get('get_active_content', 'ContentController@getActiveContent');
Route::post('save_content_image', 'ContentController@saveContentImage');
Route::post('save_imgs', 'ContentController@saveImgs');
Route::get('content_menu', 'ContentController@contentMenu');

//Career
Route::post('save_career', 'CareerController@saveCareer');
Route::get('get_all_career', 'CareerController@getAllCareer');
Route::get('get_career', 'CareerController@getCareer');
Route::post('edit_career', 'CareerController@editCareer');
Route::get('get_active_career', 'CareerController@getActiveCareer');
//Testimonial
Route::post('save_testimonial', 'TestimonialController@saveTestimonial');
Route::get('get_all_testimonial', 'TestimonialController@getAllTestimonials');
Route::get('get_testimonial', 'TestimonialController@getTestimonial');
Route::post('edit_testimonial', 'TestimonialController@editTestimonial');
Route::get('get_active_testimonial', 'TestimonialController@getActiveTestimonials');



//Blog
Route::post('save_blog', 'BlogController@saveBlog');
Route::get('get_all_blog', 'BlogController@getAllBlog');
Route::get('get_blog', 'BlogController@getBlog');
Route::post('edit_blog', 'BlogController@editBlog');
Route::get('get_active_blog', 'BlogController@getActiveBlog');
Route::post('save_blog_image', 'BlogController@saveBlogImage');



//Users
Route::post('save_user', 'UserController@saveUser');
Route::get('get_all_users', 'UserController@getAllUsers');
Route::get('get_user', 'UserController@getUser');
Route::post('edit_user', 'UserController@editUser');
Route::get('get_active_user', 'UserController@getActiveUsers');
Route::get('user_details', 'UserController@getUserDetails');
//Category
Route::post('save_category', 'PortfolioController@saveCategory');
Route::get('get_all_category', 'PortfolioController@getAllCategory');
Route::get('get_blog_category', 'PortfolioController@getBlogCategory');
Route::get('get_category', 'PortfolioController@getCategory');
Route::post('edit_category', 'PortfolioController@editCategory');
Route::get('get_active_category', 'PortfolioController@getActiveCategory');

//Product
Route::post('save_product', 'PortfolioController@saveProduct');
Route::get('get_all_product', 'PortfolioController@getAllProduct');
Route::get('get_product', 'PortfolioController@getProduct');
Route::post('edit_product', 'PortfolioController@editProduct');
Route::get('get_active_product', 'PortfolioController@getActiveProduct');
Route::post('save_docs', 'PortfolioController@saveDocs');

//Services
Route::post('save_services', 'ServicesController@saveService');
Route::get('get_all_services', 'ServicesController@getAllServices');
Route::get('get_services', 'ServicesController@getService');
Route::post('edit_services', 'ServicesController@editService');
Route::get('get_active_services', 'ServicesController@getActiveServices');
Route::post('delete_service', 'ServicesController@deleteService');
//Image Slider
Route::post('save_slider', 'ImageSliderController@saveSlider');
Route::get('get_all_slider', 'ImageSliderController@getAllSliders');
Route::get('get_slider', 'ImageSliderController@getSlider');
Route::post('edit_slider', 'ImageSliderController@editSlider');
Route::get('get_active_slider', 'ImageSliderController@getActiveSliders');
//Contact Us
Route::post('save_contact_us', 'ContactUsController@saveContactUs');
Route::get('get_all_contact_us', 'ContactUsController@getAllContactUs');
Route::get('get_contact_us', 'ContactUsController@getContactUs');
Route::post('edit_contact_us', 'ContactUsController@editContactUs');
Route::get('get_active_contact_us', 'ContactUsController@getActiveContactUs');



//API ROUTES
Route::get('api_landing_page', 'ApiController@getLandingPage');
Route::get('api_blog', 'ApiController@getBlogs');
Route::get('api_contact_us', 'ApiController@getContactUs');
Route::get('api_about_us', 'ApiController@getAboutUs');
Route::get('api_career', 'ApiController@getCareers');
Route::get('api_web_faqs', 'ApiController@getWebFaqs');
Route::get('api_web_services_category', 'ApiController@getWebAllServicesCategory');
Route::get('api_web_services', 'ApiController@getWebServices');
Route::post('api_web_service_detail', 'ApiController@getWebServiceDetails');
Route::post('api_product_listing', 'ApiController@productListing');
Route::post('api_content', 'ApiController@getContent');
Route::get('api_product', 'ApiController@getProduct');
Route::get('api_package', 'ApiController@getPackages');
Route::get('a_testimonial', 'ApiController@getTestimonials');
