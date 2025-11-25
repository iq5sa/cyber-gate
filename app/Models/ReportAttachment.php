<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportAttachment extends Model
{
    //

    use HasFactory;
    protected $fillable = [
        'security_report_id',
        'original_name',
        'filename',
        'mime_type',
        'size',
        'path',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'security_report_id');
    }
}
