<?php

namespace App\Repos;

use App\Services\Media\HasMediaInterface;
use App\Services\Media\Uploader;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'path',
        'relative_path',
        'extension',
        'name',
        'size',
        'mime_type',
        'subject_id',
        'subject_type',
        'category',
        'alt_text',
    ];

    public function scopeByRelevantNames($query, $name)
    {
        return $query->where('name', 'like', '%'.$name.'%');
    }

    public function store(Uploader $uploader,$data)
    {
        $mediaInfo = [
            'relative_path' => $uploader->getRelativePath(),
            'path' => $uploader->getAbsolutePath(),
            'mime_type' => $uploader->getMimeType(),
            'extension' => $uploader->getExtension(),
            'size' => $uploader->getSize(),
            'name' => $uploader->getFileName(),
        ];

        $dataToPersist = array_merge($data, $mediaInfo);

//        dd($dataToPersist);
//        $this->removeDuplicatedMedia($data, $entity);

        return $this->create($dataToPersist);
    }
}
