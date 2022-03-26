<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $request['slug'] = Str::slug($request->title);

        // $destinationPath = 'images/category/';
        $imageName = time() . "." . $request->slug . "." . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/category'), $imageName);

        // Category::create($request->all());
        Category::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $imageName
        ]);

        return back()->with('success', 'Category added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // $imageName = $category->title;
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $request['slug'] = Str::slug($request->title);

        $category->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
        ]);

        if ($request->image) {
            $imageName = time() . "." . $request->slug . "." . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/category'), $imageName);
            $category->update(['image' => $imageName]);
        }

        return back()->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully');
    }
}
