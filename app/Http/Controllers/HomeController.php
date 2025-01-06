<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $category_name = Category::where('name', 'like', '%spare%')->get();
        // If there are results, access the first item and its ID
        if ($category_name->isNotEmpty()) {
            $spare_id = $category_name->first()->id;
            $spare_slug = $category_name->first()->slug;
        } else {
            dd('No categories found.');
        }

        $accessories_name = Category::where('name', 'like', '%accessor%')->get();
        // If there are results, access the first item and its ID
        if ($accessories_name->isNotEmpty()) {
            $accessor_id = $accessories_name->first()->id;
            $accessor_slug = $accessories_name->first()->slug;
        } else {
            dd('No categories found.');
        }

        $spare_parts = DB::table('subcategories')
            ->where('category_id', $spare_id)
            ->whereBetween('menu_priority', [1, 5])
            ->get()
            ->flatten(1);
        if ($spare_parts) {
            foreach ($spare_parts as $s) {
                $spare_id = $s->id;
                break;
            }
        } else {
            $spare_id = '';
        }

        $accessories = DB::table('subcategories')
            ->where('category_id', $accessor_id)
            ->whereBetween('menu_priority', [1, 5])
            ->get()
            ->flatten(1);

        if ($accessories) {
            foreach ($accessories as $s) {
                $access_id = $s->id;
                break;
            }
        } else {
            $access_id = '';
        }

        return view('spare-stream.index', compact('spare_parts', 'accessories', 'brands', 'accessor_slug', 'spare_slug'));
    }

    public function spareProducts($slug)
    {
        $id = Category::where('slug', $slug)->pluck('id')->first();
        $cat_name = Category::where('slug', $slug)->pluck('name')->first();
        $subcategories = Subcategory::where('category_id', $id)->get();
        if (empty($subcategories)) {
            $subcategories = '';
        }
        return view('spare-stream.allproducts', compact('subcategories', 'cat_name'));
    }

    public function SubProducts($id)
    {
        $sub_name = Subcategory::where('id', $id)->pluck('name')->first();
        $products = Product::with('images')->where('subcategory_id', $id)->get();
        return view('spare-stream.spare-products', compact('products', 'sub_name'));
    }
    public function warranty()
    {
        return view('spare-stream.warranty');
    }

    public function support()
    {
        return view('spare-stream.support');
    }

    public function mobileDirectory()
    {
        return view('spare-stream.mobile-directory');
    }

    public function manual()
    {
        return view('spare-stream.manual');
    }

    public function order()
    {
        return view('spare-stream.order');
    }

    public function login()
    {
        return view('spare-stream.login');
    }

    public function signup()
    {
        return view('spare-stream.signup');
    }

    public function aboutUs()
    {
        return view('spare-stream.about-us');
    }

    public function Blog()
    {
        return view('spare-stream.blog');
    }

    public function blogDetail()
    {
        return view('spare-stream.blog-detail');
    }

    public function career()
    {
        return view('spare-stream.career');
    }

    public function contactUs()
    {
        return view('spare-stream.contact-us');
    }

    public function termCondition()
    {
        return view('spare-stream.term-condition');
    }
}