<?php

namespace App\Listeners\Product;

use App\Events\Product\Created;
use App\Repos\Media;

class LinkUploadedImages
{
    private $media;

    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    public function handle(Created $event)
    {
        $product = $event->product;
        $attr = $event->additionalAttr;
        $galleryIds = explode(',',$attr['gallery_images']);
        array_push($galleryIds,$attr['cover_image']);

        $media = $this->media->whereIn('id' , $galleryIds);
        $this->media->whereIn('id' , $galleryIds)->update(['subject_id' => $product->id]);
    }


}
