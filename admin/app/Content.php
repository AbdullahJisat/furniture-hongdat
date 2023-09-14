<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContentImage;

class Content extends Model
{

    protected $table = 'contents';

    public static function store($menu, $category, $title, $description, $meta_title, $meta_keyword, $meta_description, $image_path, $image_title, $alt_tag, $content_description, $more_images, $page_slug, $active, $user_id, $date)
    {
        $content = new Content();
        $content->menu = $menu;
        $content->category_id = $category;
        $content->title = $title;
        $content->description = $description;
        $content->meta_title = $meta_title;
        $content->meta_keyword = $meta_keyword;
        $content->meta_description = $meta_description;
        $content->image_title = $image_title;
        $content->image_path = $image_path;
        $content->image_alt = $alt_tag;
        $content->content = $content_description;
        $content->slug = $page_slug;
        $content->date = $date;
        $content->active = $active;
        $content->created_by = $user_id;
        $content->updated_by = $user_id;
        if ($content->save()) {
            $content_id = $content->id;

            if ($more_images != null) {

                ContentImage::store($content_id, $more_images, $menu, $user_id);
            }
        }
        return true;
    }

    public static function edit($id, $menu, $title, $description, $meta_title, $meta_keyword, $meta_description, $image_path, $image_title, $alt_tag, $content_description, $more_images, $page_slug, $active, $user_id)
    {
        $content = self::find($id);
        $content->menu = $menu;
        $content->title = $title;
        $content->description = $description;
        $content->meta_title = $meta_title;
        $content->meta_keyword = $meta_keyword;
        $content->meta_description = $meta_description;
        $content->image_title = $image_title;
        if ($image_path != "") {
            $content->image_path = $image_path;
        }

        $content->image_alt = $alt_tag;
        $content->content = $content_description;
        $content->slug = $page_slug;
        $content->active = $active;
        $content->updated_by = $user_id;
        if ($content->save()) {
            if ($more_images != null) {
                ContentImage::store($id, $more_images, $menu, $user_id);
            }
        }
        return true;
    }

    public static function getAll()
    {
        $contents = self::join('category', 'contents.category_id', '=', 'category.id')->select('contents.*', 'category.title as category')->orderBy('contents.id', 'DESC')->get();
        return $contents;
    }

    public static function getActiveContents()
    {
        $contents = self::select('title', 'description', 'page_slug', 'meta_keywords', 'meta_description', 'image_path', 'meta_title', 'category.title as category')
            ->join('category', 'contents.category_id', '=', 'category.id')
            ->where('active', 1)
            ->orderBy('contents.id', 'DESC')->get();
        return $contents;
    }

    public static function getContent($id)
    {
        $content = self::find($id);
        if (!empty($content)) {

            $content->image = ContentImage::getImages($id);
        }
        return $content;
    }

    public static function getContentBySlug($slug)
    {
        $content = self::where('page_slug', $slug)->first();
        return $content;
    }

    public static function getActiveSlider()
    {
        $content = self::select('title', 'image_path', 'image_title', 'image_alt')->where('menu', 4)->where('active', 1)->get();
        return $content;
    }

    public static function getActiveServices()
    {
        $content = self::select('title', 'image_path', 'image_title', 'image_alt', 'slug', 'description')->where('menu', 1)->where('active', 1)->orderBy('id', 'DESC')->get();
        return $content;
    }

    public static function getActivePackages()
    {
        $content = self::where('menu', 3)->where('active', 1)->first();
        return $content;
    }

    public static function getActiveBlogs()
    {
        $content = self::select('contents.title', 'contents.category_id', 'contents.image_path', 'contents.image_title', 'contents.image_alt', 'contents.slug', 'contents.description', 'contents.date', 'category.title as category')
            ->join('category', 'contents.category_id', '=', 'category.id')
            ->where('menu', 2)->where('contents.active', 1)->orderBy('contents.id', 'DESC')->get();
        return $content;
    }

    public static function getServiceBySlug($slug)
    {

        $content = self::where('slug', $slug)->where('menu', 1)->first();
        if (!empty($content)) {
            $id = $content->id;
            $content->image = ContentImage::getImages($id);
        }

        return $content;
    }

    public static function getBlogBySlug($slug)
    {

        $content = self::where('slug', $slug)->where('menu', 2)->first();
        if (!empty($content)) {
            $id = $content->id;
            $content->image = ContentImage::getImages($id);
        }

        return $content;
    }
}
