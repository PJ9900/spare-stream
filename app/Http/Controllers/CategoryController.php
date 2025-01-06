<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.top-category', compact('categories'));
    }

    public function show()
    {
        return view('admin.top-category-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'slug' => 'required|string|unique:categories,slug|max:255',
            'menu_priority' => 'required|unique:categories,menu_priority|integer|min:0',
            'status' => 'required|boolean',
            'show_menu' => 'required|boolean',
            'is_feature' => 'required|boolean',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'photo' => 'nullable|file|mimes:jpg,jpeg,webp,png,gif|max:2048',
        ]);
        $stasdf = Str::slug($request->input('name'), '-');
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = $stasdf;
        $category->menu_priority = $request->input('menu_priority');
        $category->status = $request->input('status');
        $category->show_menu = $request->input('show_menu');
        $category->is_feature = $request->input('is_feature');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/category-images', $imageName);
            $category->photo = $imageName;
        }

        if ($category->save()) {
            return redirect()->route('categories')->with('success', 'Category added successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.top-category-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug,' . $id . '|max:255',
            'menu_priority' => 'required|integer|min:0|unique:categories,menu_priority,' . $id . '|max:255',  // Modify the unique rule for menu_priority
            'status' => 'required|boolean',
            'show_menu' => 'required|boolean',
            'is_feature' => 'required|boolean',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'photo' => 'nullable|file|mimes:jpg,jpeg,webp,png,gif|max:2048',
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->menu_priority = $request->input('menu_priority');
        $category->status = $request->input('status');
        $category->show_menu = $request->input('show_menu');
        $category->is_feature = $request->input('is_feature');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');

        if ($request->hasFile('photo')) {
            if ($request->existing_photo) {
                Storage::delete('public/category-images/' . $request->existing_photo);
            }
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/category-images', $imageName);
            $category->photo = $imageName;
        }

        if ($category->save()) {
            return redirect()->route('categories')->with('success', 'Category updated successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return back()->with('fail', 'Category not found');
        } else {
            if ($category->photo && Storage::exists('public/category-images/' . $category->photo)) {
                Storage::delete('public/category-images/' . $category->photo);
                if ($category->delete()) {
                    return redirect()->route('categories')->with('success', 'Category deleted successfully!');
                } else {
                    return back()->with('fail', 'Something went wrong');
                }
            } else {
                if ($category->delete()) {
                    return redirect()->route('categories')->with('success', 'Category deleted successfully!');
                } else {
                    return back()->with('fail', 'Something went wrong');
                }
            }
        }
    }

    public function categoryDetail($slug)
    {
        $subcategory = Subcategory::where('slug', '=', $slug)->firstOrFail();
        $products = Product::with('images')  // Eager load the images relationship
            ->where('subcategory_id', $subcategory->id)
            ->get();
        $subcategory_name = $subcategory->name;  // Retrieve the subcategory name
        return view('spare-stream.category', compact('products', 'subcategory_name'));
    }
}