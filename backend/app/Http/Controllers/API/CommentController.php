<?php

namespace App\Http\Controllers\API;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function getDetail(Request $request)
    {
        $id = $request->id;
        $comment = Comment::with(['users'])->where('movie_id', '=', $id)->get();

        if ($comment) {
            return ResponseFormatter::success(
                $comment,
                'Data Detail Movie Berhasil Diambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Detail Movie Tidak Ada',
                404
            );
        }
    }
    public function createComment(Request $request)
    {
        $request->validate([
            'movie_id' => 'required',
            'comment' => 'required',
        ]);
        $comment = Comment::create([
            'movie_id' => $request->movie_id,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment
        ]);
        return ResponseFormatter::success(
            $comment,
            'Komentar Berhasil Di Buat'
        );
    }
}
