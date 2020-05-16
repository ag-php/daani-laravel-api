<?php

namespace App\Repos;

use App\Services\Media\HasMediaInterface;
use App\Services\Media\Uploader;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];


}
