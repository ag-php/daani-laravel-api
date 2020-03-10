<?php

namespace App\Services\Media;

use App\Repos\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Uploader
{
    private $file;
    private $storage;
    private $fileName;
    private $relativePath;
    private $absolutePath;
    private $extension;
    private $mimeType;
    private $size;
    private $media;
    private $properties;

    public function __construct(UploadedFile $file, Storage $storage, Media $media, array $properties)
    {
        $this->file = $file;
        $this->properties = $properties;
        $this->media = $media;
        $this->storage = $storage::disk(config('storage.driver.media'));
    }

    public function parseImageDetails(): void
    {
        $this->extension = $this->file->getClientOriginalExtension();
        $this->fileName = $this->generateUniqueName();
        $this->mimeType = $this->file->getMimeType();
        $this->size = $this->file->getSize();
    }

    public function upload(): self
    {
        $this->parseImageDetails();
        $this->relativePath = $this->file->storeAs(config('storage.folder.media'), $this->fileName, config('storage.driver.media'));
        $this->absolutePath = $this->storage->url($this->relativePath);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    public function getRelativePath(): string
    {
        return $this->relativePath;
    }

    /**
     * @return mixed
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @return mixed
     */
    public function getAbsolutePath(): string
    {
        return $this->absolutePath;
    }

    /**
     * @return mixed
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    private function generateUniqueName(): string
    {
        $name = $this->file->getClientOriginalName();
        if (isset($this->properties['name']) && $this->properties['name']) {
            $name = $this->properties['name'];
        }

        $nameWithoutExtension = Str::slug(pathinfo($name, PATHINFO_FILENAME));
        $mediaNames = $this->media->byRelevantNames($nameWithoutExtension)->pluck('name')->toArray();
        $fullImageName = Str::slug($nameWithoutExtension).'.'.$this->file->getClientOriginalExtension();
        $counter = 1;

        while (\in_array($fullImageName, $mediaNames)) {
            $fullImageName = Str::slug($nameWithoutExtension).'-'.$counter.'.'.$this->file->getClientOriginalExtension();
            ++$counter;
        }

        return $fullImageName;
    }
}
