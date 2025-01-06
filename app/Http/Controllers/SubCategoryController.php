<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('admin.mid-category', compact('subcategories'));
    }

    public function show()
    {
        $categories = Category::all();
        return view('admin.mid-category-add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|max:255',
            // 'slug' => 'required|string|unique:categories,slug|max:255',
            'photo' => 'nullable|file|mimes:jpg,jpeg,webp,png,gif|max:2048',
            'menu_priority' => 'required|integer|min:0',
            'status' => 'required|boolean',
            'show_menu' => 'required|boolean',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);
        $stasdf = Str::slug($request->input('name'), '-');
        $slugcheck = Subcategory::where('slug', $request->input('slug'))
            ->where('category_id', $request->input('category_id'))->first();

        $subcategory = new Subcategory();
        $subcategory->name = $request->input('name');
        if (empty($slugcheck)) {
            $subcategory->slug = $stasdf;
        } else {
            dd('Slug and Category is same So slug can not be filled.');
        }
        $subcategory->menu_priority = $request->input('menu_priority');
        $subcategory->status = $request->input('status');
        $subcategory->show_menu = $request->input('show_menu');
        $subcategory->category_id = $request->input('category_id');
        $subcategory->meta_keywords = $request->input('meta_keywords');
        $subcategory->meta_description = $request->input('meta_description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/subcategory-images', $imageName);
            $subcategory->image = $imageName;
        }

        if ($subcategory->save()) {
            return redirect()->route('subcategories')->with('success', 'SubCategory added successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
    public function edit($id)
    {
        $subcategory = Subcategory::find($id);
        $category = Category::select('id', 'name')->get();
        return view('admin.mid-category-edit', compact(['subcategory', 'category']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|max:255',
            'slug' => 'required|string|max:255',
            'menu_priority' => 'required|integer|min:0|max:255',  // Modify the unique rule for menu_priority
            'status' => 'required|boolean',
            'photo' => 'nullable|file|mimes:jpg,jpeg,webp,png,gif|max:2048',
            'show_menu' => 'required|boolean',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        $slugcheck = Subcategory::where('slug', $request->input('slug'))
            ->where('category_id', $request->input('category_id'))->first();

        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->input('name');
        if (empty($slugcheck)) {
            $subcategory->slug = $request->input('slug');
        } else {
            dd('Slug and Category is same So slug can not be filled.');
        }
        $subcategory->slug = $request->input('slug');
        $subcategory->menu_priority = $request->input('menu_priority');
        $subcategory->status = $request->input('status');
        $subcategory->show_menu = $request->input('show_menu');
        $subcategory->category_id = $request->input('category_id');
        $subcategory->meta_keywords = $request->input('meta_keywords');
        $subcategory->meta_description = $request->input('meta_description');

        if ($request->hasFile('photo')) {
            if ($request->existing_photo) {
                Storage::delete('public/subcategory-images/' . $request->existing_photo);
            }
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/subcategory-images', $imageName);
            $subcategory->image = $imageName;
        }

        if ($subcategory->save()) {
            return redirect()->route('subcategories')->with('success', 'SubCategory updated successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
    public function delete($id)
    {
        $subcategory = Subcategory::find($id);
        if (!$subcategory) {
            return back()->with('fail', 'SubCategory not found');
        } else {
            if ($subcategory->image && Storage::exists('public/subcategory-images/' . $subcategory->image)) {
                Storage::delete('public/subcategory-images/' . $subcategory->image);
                if ($subcategory->delete()) {
                    return redirect()->route('subcategories')->with('success', 'Subcategory deleted successfully!');
                } else {
                    return back()->with('fail', 'Something went wrong');
                }
            } else {
                if ($subcategory->delete()) {
                    return redirect()->route('subcategories')->with('success', 'Subcategory deleted successfully!');
                } else {
                    return back()->with('fail', 'Something went wrong');
                }
            }
        }
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }
}