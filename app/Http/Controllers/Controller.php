<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected static function uploadImage($imageStoredLocation, $image)
    {
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($imageStoredLocation), $imageName);
        return [
            'uploaded_path' => $imageStoredLocation . $imageName,
            'image_name' => $imageName
        ];
    }

    // protected static function uploadImage($imageStoredLocation, $image)
    // {
    //     if (!file_exists(public_path($imageStoredLocation))) {
    //         mkdir(public_path($imageStoredLocation), 0777, true);
    //     }

    //     $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
    //     try {
    //         $image->move(public_path($imageStoredLocation), $imageName);
    //     } catch (\Exception $e) {
    //         return [
    //             'uploaded_path' => null,
    //             'image_name' => null,
    //             'error' => $e->getMessage()
    //         ];
    //     }

    //     return [
    //         'uploaded_path' => $imageStoredLocation . $imageName,
    //         'image_name' => $imageName
    //     ];
    // }


    protected static function uploadVideo($videoStoredLocation, $video)
    {
        $videoName = uniqid() . '.' . $video->getClientOriginalExtension();
        $video->move(public_path($videoStoredLocation), $videoName);
        return [
            'uploaded_path' => $videoStoredLocation . $videoName,
            'video_name' => $videoName
        ];
    }
}
