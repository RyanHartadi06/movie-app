<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all(Request $request)
    {
        // $category = Category::all();
        $slug = $request->input('slug');
        $name = $request->input('name');
        $limit = $request->input('limit');

        if ($slug) {
            $category = Category::with(['movies'])->where('slug', '=', $slug)->get();

            if ($category) {
                return ResponseFormatter::success(
                    $category,
                    'Data Kategori Berhasil Diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Kategori Tidak Ada',
                    404
                );
            }
        }
        $category = Category::query();

        if ($name) {
            $category->where('name', 'like', '%' . $name . '%');
        }
        return ResponseFormatter::success(
            $category->latest()->paginate($limit),
            'Data List Kategori Berhasil Diambil'
        );
    }
}
