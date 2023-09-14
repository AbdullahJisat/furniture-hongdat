<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioVideo extends Model {

    protected $table = 'portfolio_videos';

    public static function store($content_id, $videos, $user_id) {
        self::deleteVideo($content_id);

        foreach ($videos as $item) {
            $content = new PortfolioVideo();
            $content->fourth_layer_id = $content_id;
            $content->video_path = $item["video_path"];
            $content->created_by = $user_id;
            $content->save();
        }
        return 1;
    }

    public static function getVideos($content_id) {
        $content = self::where('fourth_layer_id', $content_id)->get();
        return $content;
    }

    public static function getAll() {
        $content = self::orderBy('id', 'DESC')->get();
        return $content;
    }

    public static function deleteVideo($content_id) {
        $content = self::where('fourth_layer_id', $content_id);
        $content->delete();
    }

}
