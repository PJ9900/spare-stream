<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Mode;
use App\Models\SpareCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpareCategoryController extends Controller
{
    public function index()
    {
        $submodels = SpareCategory::all();
        return view('admin.spare-category', compact('submodels'));
    }

    public function show()
    {
        $brands = Brand::all();
        return view('admin.spare-category-add', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'submodel' => 'required|string|max:255',
            'photo' => 'nullable|file|mimes:jpg,jpeg,webp,png,gif|max:2048',
            'brand_id' => 'required|integer',
            'model' => 'required|integer',
        ]);

        $stasdf = Str::slug($request->input('name'), '-') . $request->input('model');
        $submodel = new SpareCategory();
        $submodel->name = $request->input('name');
        $submodel->spare_name = $request->input('submodel');
        $submodel->brand_id = $request->input('brand_id');
        $submodel->model_id = $request->input('model');
        $submodel->slug = $stasdf;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/submodel-images', $imageName);
            $submodel->photo = $imageName;
        }

        if ($submodel->save()) {
            return redirect()->route('submodels')->with('success', 'SubModel added successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function edit($slug)
    {
        $submodel = SpareCategory::where('slug', $slug)->first();
        $brands = Brand::all();
        $models = Mode::all();

        return view('admin.spare-category-edit', compact('submodel', 'brands', 'models'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:modes,slug,' . $id . '|max:255',
            'submodel' => 'required|string|max:255',
            'photo' => 'nullable|file|mimes:jpg,jpeg,webp,png,gif|max:2048',
            'brand_id' => 'required|integer',
            'model' => 'required|integer',
        ]);

        $submodel = SpareCategory::find($id);
        $submodel->name = $request->input('name');
        $submodel->spare_name = $request->input('submodel');
        $submodel->brand_id = $request->input('brand_id');
        $submodel->model_id = $request->input('model');
        $submodel->slug = $request->input('slug');

        if ($request->hasFile('photo')) {
            if ($request->existing_photo) {
                Storage::delete('public/submodel-images/' . $request->existing_photo);
            }
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/submodel-images', $imageName);
            $submodel->photo = $imageName;
        }

        if ($submodel->save()) {
            return redirect()->route('submodels')->with('success', 'SubModel updated successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function delete($id)
    {
        $model = SpareCategory::find($id);
        if (!$model) {
            return back()->with('fail', 'SubModel not found');
        } else {
            if ($model->photo && Storage::exists('public/submodel-images/' . $model->photo)) {
                Storage::delete('public/submodel-images/' . $model->photo);
                if ($model->delete()) {
                    return redirect()->route('submodels')->with('success', 'SubModel deleted successfully!');
                } else {
                    return back()->with('fail', 'Something went wrong');
                }
            } else {
                if ($model->delete()) {
                    return redirect()->route('submodels')->with('success', 'SubModel deleted successfully!');
                } else {
                    return back()->with('fail', 'Something went wrong');
                }
            }
        }
    }

    public function getSubModels($id)
    {
        $submodels = SpareCategory::where('model_id', $id)->get();
        return response()->json([
            'models' => $submodels
        ]);
    }
}
