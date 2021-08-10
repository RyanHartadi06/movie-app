<?php

namespace App\Http\Controllers\API;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function all(Request $request)
    {
        $slug = $request->input('slug');
        $title = $request->input('title');
        $limit = $request->input('limit');
        if ($slug) {
            $movie = Movie::with(['category', 'users', 'comment'])->where('slug', '=', $slug)->get();

            if ($movie) {
                return ResponseFormatter::success(
                    $movie,
                    'Data Movie Berhasil Diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Movie Tidak Ada',
                    404
                );
            }
        }
        $movie = Movie::query()->with(['category', 'users', 'comment']);

        if ($title) {
            $movie->where('title', 'like', '%' . $title . '%');
        }


        return ResponseFormatter::success(
            $movie->latest()->paginate($limit),
            'Data Movie Berhasil Diambil'
        );
    }
}
