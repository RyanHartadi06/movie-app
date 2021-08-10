<?php

namespace App\Http\Controllers\API;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function postRating(Request $request)
    {
        $request->validate([
            'movie_id' => 'required',
            'rating' => 'required',
        ]);
        $movie = Rating::where('movie_id', '=', $request->movie_id);
        $moviebagi = Rating::where('movie_id', '=', $request->movie_id)->get();
        $sum = $movie->sum('rating');
        $sumbagi = $moviebagi->count();
        $hitungrate = $sum / $sumbagi;
        $rating = Rating::create([
            'movie_id' => $request->movie_id,
            'user_id' => Auth::user()->id,
            'rating' =>  $request->rating,
        ]);
        $ratingupdate = Movie::find($request->movie_id);
        $ratingupdate->rating = $hitungrate;
        $ratingupdate->save();
        return ResponseFormatter::success(
            $rating,
            'Rating Berhasil Di Buat'
        );
    }
}
