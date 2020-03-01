<?php

namespace App;

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
}
