<?php

namespace App\Http\Controllers;

use App\Models\Legislation;
use App\Models\SecurityTip;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function legislations()
    {
        $items = Legislation::latest()->get();
        return view('legislations', compact('items'));
    }

    public function securityTips()
    {
        // Get only published tips (is_published = 1)
        $tips = SecurityTip::where('is_published', 1)
            ->latest()
            ->paginate(12);

        return view('security-tips', compact('tips'));
    }

    public function showTip($slug)
    {
        // Fetch only published tip by slug
        $tip = SecurityTip::where('slug', $slug)
            ->where('status', 'published')
            ->first();

        // If not found or not published → 404
        if (!$tip) {
            return view("404");
        }

        // Fetch published related tips (exclude current tip)
        $relatedTips = SecurityTip::where('status', 'published')
            ->where('id', '!=', $tip->id)
            ->latest()
            ->take(5)
            ->get();

        return view('security-tips-details', [
            'tip' => $tip,
            'relatedTips' => $relatedTips,
        ]);
    }



    public function faq()
    {
        return view('get-help');
    }



}
