<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', [
            'category' => $category
        ]);
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $key =  Str::random(10);
        $file = Request()->image;
        $filename = 'assets/category' . '/' . $key . '.' . $file->extension();
        $file->move(public_path('assets/category'), $filename);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $filename,

        ];
        Category::create($data);
        return redirect('category');
    }
}
