<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    use HasFactory;
    //

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'reporter_role',
        'title',
        'category',
        'impact',
        'ongoing',
        'who_affected',
        'sensitive_data',
        'description',
        'follow_up',
        'confirm',
        'agree_policy',
        'reference',
        'status',
    ];

    protected $casts = [
        'ongoing' => 'boolean',
        'confirm' => 'boolean',
        'agree_policy' => 'boolean',
    ];

    public function attachments()
    {
        return $this->hasMany(ReportAttachment::class, 'report_id');
    }


    /**
     * Scope for recent reports
     */
    public function scopeLatestFirst($query)
    {
        return $query->orderByDesc('created_at');
    }


}
