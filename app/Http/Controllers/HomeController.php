<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Traveling;

class HomeController extends Controller
{
    /**
     * Display the home/dashboard page.
     */
   public function index()
{
    $user = auth()->user();

    if (!$user) {
        return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu.');
    }

    $travelLogs = Traveling::where('user_id', $user->id)->orderBy('travel_date', 'desc')->take(5)->get();
    $totalLogs = Traveling::where('user_id', $user->id)->count();

    return view('home.index', compact('travelLogs', 'totalLogs'));
}

}