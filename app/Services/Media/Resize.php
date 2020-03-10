<?php

namespace App\Services\Media;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class Resize
{
    private $file;
    private $storage;
    private $entity;
    private $imageManager;
    private $fileName;

    public function __construct(Uploader $uploader, ImageManager $imageManager)
    {
    }

    public function upload()
    {
        $this->uploadOriginalImage();
        $this->uploadResizedImages();
    }

    public function uploadOriginalImage()
    {
        $imageName = pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $this->file->getClientOriginalExtension();
        $this->fileName = str_slug($imageName).'.'.$extension;

//        $path = $this->file->storeAs(config('storage.folder.media'), $name, config('storage.driver.media'));
//        dd($this->storage->url($path));
    }

    public function uploadResizedImages()
    {
        $folder = config('storage.folder.media');
        foreach ($this->entity->getSizes() as $key => $size) {
            $image = $this->imageManager->make($this->file);
            list($width, $height) = $size;

            $image = $image->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });

            $pathToSave = $folder.'/'.$key.'/'.$this->fileName;
            $this->storage->put($pathToSave, $image->stream());
        }
    }

    public function getUploadFileLink()
    {
    }
}
