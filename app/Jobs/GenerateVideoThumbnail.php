<?php

namespace App\Jobs;

use App\Models\SecurityTip;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GenerateVideoThumbnail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $securityTipId;

    public function __construct(int $securityTipId)
    {
        $this->securityTipId = $securityTipId;
    }

    public function handle()
    {
        $item = SecurityTip::find($this->securityTipId);

        if (! $item || ! $item->video_path) {
            return;
        }

        $videoRelative = ltrim($item->video_path, '/');
        $videoPath = storage_path('app/public/' . $videoRelative);

        if (!file_exists($videoPath)) {
            Log::error('GenerateVideoThumbnail: video file not found', ['video' => $videoPath, 'id' => $this->securityTipId]);
            return;
        }

        $posterDirRelative = 'posters';
        $posterDir = storage_path('app/public/' . $posterDirRelative);
        if (!is_dir($posterDir) && !mkdir($posterDir, 0755, true) && !is_dir($posterDir)) {
            Log::error('GenerateVideoThumbnail: failed to create posters dir', ['dir' => $posterDir]);
            return;
        }

        $filename = pathinfo($videoPath, PATHINFO_FILENAME);
        $posterName = $filename . '.jpg';
        $posterPath = $posterDir . '/' . $posterName;

        $ffmpegPath = trim(shell_exec('which ffmpeg 2>/dev/null') ?: '');
        if ($ffmpegPath === '') {
            Log::error('GenerateVideoThumbnail: ffmpeg not found');
            return;
        }

        $escapedVideo  = escapeshellarg($videoPath);
        $escapedPoster = escapeshellarg($posterPath);

        $cmd = "{$ffmpegPath} -y -i $escapedVideo -ss 00:00:01 -vframes 1 $escapedPoster 2>&1";

        $output = [];
        $returnVar = null;
        exec($cmd, $output, $returnVar);
        $outputText = implode("\n", $output);

        if ($returnVar !== 0 || !file_exists($posterPath)) {
            Log::error('GenerateVideoThumbnail: ffmpeg failed', [
                'cmd' => $cmd,
                'return' => $returnVar,
                'output' => $outputText,
            ]);
            return;
        }

        // Save poster relative path on the model
        $item->video_poster = $posterDirRelative . '/' . $posterName;
        $item->save();

        Log::info('GenerateVideoThumbnail: success', ['video' => $videoPath, 'video_poster' => $posterPath, 'id' => $this->securityTipId]);
    }
}
