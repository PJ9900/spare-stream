<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Mode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ModelController extends Controller
{

    public function index()
    {
        $models = Mode::all();
        return view('admin.model', compact('models'));
    }

    public function show()
    {
        $brands = Brand::all();
        return view('admin.model-add', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:modes',
            'status' => 'required|boolean',
            'photo' => 'nullable|file|mimes:jpg,jpeg,webp,png,gif|max:2048',
            'brand_id' => 'required|integer',
        ]);

        $stasdf = Str::slug($request->input('name'), '-');
        $model = new Mode();
        $model->name = $request->input('name');
        $model->slug = $stasdf;
        $model->status = $request->input('status');
        $model->brand_id = $request->input('brand_id');

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/model-images', $imageName);
            $model->image = $imageName;
        }

        if ($model->save()) {
            return redirect()->route('models')->with('success', 'Model added successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $model = Mode::find($id);
        $brands = Brand::all();
        return view('admin.model-edit', compact('model', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:modes,name,' . $id,
            'slug' => 'required|string|unique:modes,slug,' . $id . '|max:255',
            'status' => 'required|boolean',
            'photo' => 'nullable|file|mimes:jpg,jpeg,webp,png,gif|max:2048',
            'brand_id' => 'required|integer',
        ]);

        $model = Mode::find($id);
        $model->name = $request->input('name');
        $model->status = $request->input('status');
        $model->slug = $request->input('slug');
        $model->brand_id = $request->input('brand_id');

        if ($request->hasFile('photo')) {
            if ($request->existing_photo) {
                Storage::delete('public/model-images/' . $request->existing_photo);
            }
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/model-images', $imageName);
            $model->image = $imageName;
        }

        if ($model->save()) {
            return redirect()->route('models')->with('success', 'Model updated successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function delete($id)
    {
        $model = Mode::find($id);
        if (!$model) {
            return back()->with('fail', 'Model not found');
        } else {
            if ($model->image && Storage::exists('public/model-images/' . $model->image)) {
                Storage::delete('public/model-images/' . $model->image);
                if ($model->delete()) {
                    return redirect()->route('models')->with('success', 'Model deleted successfully!');
                } else {
                    return back()->with('fail', 'Something went wrong');
                }
            } else {
                if ($model->delete()) {
                    return redirect()->route('models')->with('success', 'Model deleted successfully!');
                } else {
                    return back()->with('fail', 'Something went wrong');
                }
            }
        }
    }

    public function getModels($id)
    {
        $models = Mode::where('brand_id', $id)->get();
        return response()->json([
            'models' => $models
        ]);
    }
}
