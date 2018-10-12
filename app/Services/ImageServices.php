<?php

namespace App\Services;

use http\Env\Request;
use Intervention\Image\Constraint;
use Image;

class ImageServices
{
    public function nameImage($image)
    {
        $filename = 'uploads/' . $image->getClientOriginalName();
        $this->resizeImage($image, $filename);
        return $filename;
    }


    public function resizeImage($image, $filename, $with = 300, $height = 292)
    {
        Image::make($image->getRealPath())->fit($with, $height)->save($filename);
    }
}