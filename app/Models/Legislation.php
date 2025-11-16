<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Legislation extends Model
{
    //

    protected $fillable = [
        'title',
        'description',
        "pdf_path"
    ];
}
