<?php

namespace App\Http\Controllers;

use App\Models\ProductColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    public function index()
    {
        $colors = ProductColor::all();
        return view('admin.color', compact('colors'));
    }

    public function show()
    {
        return view('admin.color-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'color_name' => 'required|string|max:255',
            'color_code' => 'required|string|max:255'
        ]);

        $pro_color = new ProductColor();
        $pro_color->color_name = $request->input('color_name');
        $pro_color->color_code = $request->input('color_code');

        if ($pro_color->save()) {
            return redirect()->route('color')->with('success', 'Color added successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $color = ProductColor::find($id);
        return view('admin.color-edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'color_name' => 'required|string|max:255',
            'color_code' => 'required|string|max:255',
        ]);

        $color = ProductColor::find($id);
        $color->color_name = $request->input('color_name');
        $color->color_code = $request->input('color_code');

        if ($color->save()) {
            return redirect('color')->with('success', 'Color updated successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function delete($id)
    {
        $color = ProductColor::find($id);

        if ($color->delete()) {
            return redirect()->route('color')->with('success', 'Color deleted successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
}
