<?php

namespace App\Services\Media;

use Intervention\Image\ImageManager;

class Resizer
{
    private $imagePath;

    public function __construct($imagePath, ImageManager $imageManager)
    {
    }
}
