<?php

namespace App\Models;

use App\Jobs\GenerateVideoThumbnail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SecurityTip extends Model
{
    //

    protected $fillable = [
        'title',
        "slug",
        "excerpt",
        "content",
        "image",
        'video_path',
        'video_poster',
        "category_id",
        "is_published",
        "published_at"
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(TipCategory::class);
    }


    protected static function booted(): void
    {
        static::saved(function (SecurityTip $model) {
            // only when there's a video and either no poster or video changed
            if ($model->video_path && ! $model->video_poster) {
                GenerateVideoThumbnail::dispatch($model->id);
            }
        });
    }

}
