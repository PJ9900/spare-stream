<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Mode;
use App\Models\Product;
use App\Models\SpareCategory;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $products = count($products);
        $customers = User::where('role_as', '!=', 'admin')->get();
        $customers = count($customers);
        $categories = Category::all();
        $categories = count($categories);
        $subcategories = Subcategory::all();
        $subcategories = count($subcategories);
        $brands = Brand::all();
        $brands = count($brands);
        $models = Mode::all();
        $models = count($models);
        $model_accessories = SpareCategory::all();
        $model_accessories = count($model_accessories);
        return view('admin.index', compact('products', 'customers', 'categories', 'subcategories', 'models', 'brands', 'model_accessories'));
    }
}
