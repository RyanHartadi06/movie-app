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
            'name' => 'required',
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
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('category');
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }
    public function update(Request $request,  $id)
    {
        $category = Category::findOrFail($id);
        if ($request->image <> "") {
            $key =  Str::random(10);
            $file = Request()->image;
            $filename = 'assets/category' . '/' . $key . '.' . $file->extension();
            $file->move(public_path('assets/category'), $filename);


            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->image = $filename;
            $category->save();
        } else {
            $category = Category::findOrFail($id);

            $category->name = $request->name;
            $category->slug = Str::slug($request->name);

            $category->save();
        }

        return redirect('category');
    }
}
