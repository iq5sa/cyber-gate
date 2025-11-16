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
        // Fetch latest 12 tips
        $tips = SecurityTip::latest()->paginate(12);

        // Handle empty table gracefully
        if ($tips->isEmpty()) {
            // Optionally, you can show a message or fetch fallback tips
            $tips = collect(); // empty collection
        }

        // Return the view with tips
        return view('security-tips', [
            'tips' => $tips,
        ]);
    }


    public function reportIncident()
    {
        return view('report-incident');
    }

    public function faq()
    {
        return view('get-help');
    }

    public function showTip($slug)
    {
        // Attempt to fetch the tip by slug
        $tip = SecurityTip::where('slug', $slug)->first();

        // Handle case where the tip does not exist
        if (!$tip) {
            return view("404");
            //abort(404, 'عذرًا، لم يتم العثور على المقال المطلوب.');
        }


        // Optional: Load related tips for recommendations
        $relatedTips = SecurityTip::where('id', '!=', $tip->id)
            ->latest()
            ->take(5)
            ->get();

        // Return the view with tip and related tips
        return view('security-tips-details', [
            'tip' => $tip,
            'relatedTips' => $relatedTips,
        ]);
    }

}
