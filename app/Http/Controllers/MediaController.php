<?php

namespace App\Http\Controllers;

use App\Events\Media\Uploaded;
use App\Http\Controllers\Controller;
use App\Http\Requests\Media\MediaRequest;
use App\Http\Resources\MediaResource;
use App\Repos\Media;
use App\Services\Media\Uploader as MediaUploader;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller
{
    public function store(Request $request, Media $media)
    {

        Log::info('secret key loggin ok',['key' => str_replace('\n', "\n", base64_decode(env('GOOGLE_CLOUD_PRIVATE_KEY')))]);
        $files = $request->file('files');
        $mediaIds = [];
        foreach ($files as $key => $file) {

            $properties = [
//                'subject_id' => $request->get('subject_id'),
                'subject_type' => $request->get('subject_type'),
                'category' => $request->get('category'),
            ];

            $imageUploader = app(MediaUploader::class, [
                'file' => $file,
                'properties' => $properties,
            ]);
            $imageUploader->upload();
            $media = $media->store($imageUploader,$properties);
            $mediaIds[$media->id] = $media->path;
        }

        return response(['status' =>'success','data' => $mediaIds]);
    }


    public function delete($id, Media $media)
    {
        $media = $media->findOrFail($id);
        $this->authorize('delete', $media);

        $media->delete();

        return $this->response->respondDeleted();
    }

    public function update(MediaRequest $request, Media $media)
    {
        $media = $media->findOrFail($request->id);

        $media->update($request->validated());

        return $this->response->respondUpdated(new MediaResource($media));
    }
}
