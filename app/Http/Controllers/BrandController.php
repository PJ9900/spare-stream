<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand', compact('brands'));
    }

    public function show()
    {
        return view('admin.brand-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'is_popular' => 'required|boolean',
            'photo' => 'nullable|file|mimes:jpg,jpeg,webp,png,gif|max:2048',
        ]);

        $stasdf = Str::slug($request->input('name'), '-');
        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->slug = $stasdf;
        $brand->status = $request->input('status');
        $brand->is_popular = $request->input('is_popular');

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/brand-images', $imageName);
            $brand->photo = $imageName;
        }

        if ($brand->save()) {
            return redirect()->route('brands')->with('success', 'Brand added successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand-edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:brands,slug,' . $id . '|max:255',
            'status' => 'required|boolean',
            'is_popular' => 'required|boolean',
            'photo' => 'nullable|file|mimes:jpg,jpeg,webp,png,gif|max:2048',
        ]);

        $brand = Brand::find($id);
        $brand->name = $request->input('name');
        $brand->slug = $request->input('slug');
        $brand->status = $request->input('status');
        $brand->is_popular = $request->input('is_popular');

        if ($request->hasFile('photo')) {
            if ($request->old_photo) {
                Storage::delete('public/brand-images/' . $request->old_photo);
            }
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/brand-images', $imageName);
            $brand->photo = $imageName;
        }

        if ($brand->save()) {
            return redirect()->route('brands')->with('success', 'Brand updated successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return back()->with('fail', 'Brand not found');
        } else {
            if ($brand->photo && Storage::exists('public/brand-images/' . $brand->photo)) {
                Storage::delete('public/brand-images/' . $brand->photo);

                if ($brand->delete()) {
                    return redirect()->route('brands')->with('success', 'Brand deleted successfully!');
                } else {
                    return back()->with('fail', 'Something went wrong');
                }
            }
        }
    }
}