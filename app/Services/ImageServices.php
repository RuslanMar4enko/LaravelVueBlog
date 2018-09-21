<?php

namespace App\Services;

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

    public function multiplyImage($images)
    {
        for($i = 0; $i < count($images); $i++){
            $this->nameImage($images[$i]);
        }
    }

    public function resizeImage($image, $filename)
    {
        Image::make($image->getRealPath())->fit(300, 292)->save($filename);
    }
}