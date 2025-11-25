<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportAttachment extends Model
{
    //

    use HasFactory;
    protected $fillable = [
        'report_id',
        'upload_token',
        'original_name',
        'filename',
        'mime_type',
        'size',
        'path'
    ];

    protected $casts = [
        'size' => 'integer',
    ];

    /**
     * Parent report (nullable until attached)
     */
    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
