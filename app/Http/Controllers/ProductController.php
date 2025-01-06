<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Mode;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\SpareCategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        // $products = DB::table('products')
        //     ->join('product_images', 'products.id', '=', 'product_images.product_id')
        //     ->select('products.*', 'product_images.image')  // Select necessary columns
        //     ->get();
        // $products = Product::with(['product_images' => function ($query) {
        //     $query->orderBy('created_at')->first();  // Order by created_at or any other criteria
        // }])->get();
        // $products = Product::with('productPhoto')->get();
        $products = DB::table('products')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.name as bname')->get();
        // dd($products);
        return view('admin.product', compact('products'));
    }

    public function show()
    {
        $categories = Category::select('id', 'name')->get();
        $colors = ProductColor::all();
        $brands = Brand::all();
        $models = Mode::all();
        return view('admin.product-add', compact(['categories', 'colors', 'brands', 'models']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_id' => 'required|integer|exists:categories,id',
            'mcat_id' => 'required|integer|exists:subcategories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'model' => 'required|integer|exists:modes,id',
            'submodel' => 'required|integer|exists:spare_categories,id',
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:255',
            'photo' => 'array',
            'photo.*' => 'file|mimes:jpg,jpeg,webp,png,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            // 'sku' => 'nullable|string|regex:/^[A-Za-z0-9\-\$\#]+$/|max:255',
            'quantity' => 'required|integer|min:0',
            'video' => 'nullable|url',
            // 'slug' => 'required|string|max:255|unique:products,slug',
            'details' => 'nullable|string',
            'warrenty_policy' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);


        // Log::info(request()->all());
        $firstWord = strtok($request->input('name'), ' ');
        $skuPrefix = strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $firstWord));
        $uniqueIdentifier = rand(10000000, 99999999);
        $sku = ($skuPrefix . '-' . $uniqueIdentifier);

        $headingData = [];

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'heading') === 0) {
                $headingIndex = str_replace('heading', '', $key);
                $headingName = $value;

                $keys = $request->input("key-$headingIndex", []);
                $values = $request->input("value-$headingIndex", []);

                $keyValuePairs = [];
                foreach ($keys as $index => $key) {
                    if (!empty($key) && isset($values[$index]) && !empty($values[$index])) {
                        $keyValuePairs[$key] = $values[$index];
                    }
                }

                if (!empty($keyValuePairs)) {
                    $headingData[$headingName] = $keyValuePairs;
                }
            }
        }

        $jsonData = json_encode($headingData);
        // dd($jsonData);
        $stasdf = Str::slug($request->input('name'), '-');
        $flag = 0;
        $product = new Product();
        $product->name = $request->input('name');
        $product->color = $request->input('color');
        $product->sku = $sku;
        $product->pro_specification = $jsonData;
        $product->price = $request->input('price');
        $product->model_id = $request->input('model');
        $product->submodel_id = $request->input('submodel');
        $product->discounted_price = $request->input('discount_price');
        $product->quantity = $request->input('quantity');
        $product->video = $request->input('video');
        $product->details = $request->input('details');
        $product->warranty_policy = $request->input('warrenty_policy');
        $product->category_id = $request->input('cat_id');
        $product->subcategory_id = $request->input('mcat_id');
        $product->brand_id = $request->input('brand_id');
        $product->slug = $stasdf;
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->status = $request->input('status');
        if ($product->save()) {

            $imagePaths = [];

            if ($request->hasFile('photo')) {
                foreach ($request->file('photo') as $image) {
                    $imagePath = microtime(true) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/products-images', $imagePath);

                    $imagePaths[] = $imagePath;
                }
            } else {
                $flag = 1;
            }

            foreach ($imagePaths as $imagePath) {
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image = $imagePath;
                $productImage->save();
                $flag = 1;
            }
        }

        if ($flag) {
            return redirect()->route('products')->with('success', 'Product added successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $product_images = ProductImage::where('product_id', '=', $product->id)->select('image', 'id')->get();
        $categories = Category::all();
        $colors = ProductColor::all();
        $brands = Brand::all();
        $models = Mode::all();
        $submodels = SpareCategory::all();
        $specification = json_decode($product->pro_specification);
        $subcategories = Subcategory::where('category_id', '=', $product->category_id)->select('id', 'name')->get();
        return view('admin.product-edit', compact(['product', 'specification', 'product_images', 'categories', 'colors', 'subcategories', 'brands', 'models', 'submodels']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cat_id' => 'required|integer|exists:categories,id',
            'mcat_id' => 'required|integer|exists:subcategories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'model' => 'required|integer|exists:modes,id',
            'submodel' => 'required|integer|exists:spare_categories,id',
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:255',
            'photo' => 'array',
            'photo.*' => 'file|mimes:jpg,jpeg,webp,png,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|regex:/^[A-Za-z0-9\-\$\#]+$/|max:255',
            'quantity' => 'required|integer|min:0',
            'video' => 'nullable|url',
            'slug' => 'required|string|unique:products,slug,' . $id . '|max:255',
            'details' => 'nullable|string',
            'warrenty_policy' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        $headingData = [];

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'heading') === 0) {
                $headingIndex = str_replace('heading', '', $key);
                $headingName = $value;

                $keys = $request->input("key-$headingIndex", []);
                $values = $request->input("value-$headingIndex", []);

                $keyValuePairs = [];
                foreach ($keys as $index => $key) {
                    if (!empty($key) && isset($values[$index]) && !empty($values[$index])) {
                        $keyValuePairs[$key] = $values[$index];
                    }
                }

                if (!empty($keyValuePairs)) {
                    $headingData[$headingName] = $keyValuePairs;
                }
            }
        }

        $jsonData = json_encode($headingData);
        // dd($jsonData);ss

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->color = $request->input('color');
        $product->sku = $request->input('sku');
        $product->pro_specification = $jsonData;
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->video = $request->input('video');
        $product->details = $request->input('details');
        $product->warranty_policy = $request->input('warrenty_policy');
        $product->category_id = $request->input('cat_id');
        $product->subcategory_id = $request->input('mcat_id');
        $product->brand_id = $request->input('brand_id');
        $product->model_id = $request->input('model');
        $product->submodel_id = $request->input('submodel');
        $product->slug = $request->input('slug');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->status = $request->input('status');
        $flag = 0;
        if ($product->save()) {
            $imagePaths = [];

            if ($request->hasFile('photo')) {
                foreach ($request->file('photo') as $image) {
                    $imagePath = microtime(true) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/products-images', $imagePath);

                    $imagePaths[] = $imagePath;
                }
            } else {
                $flag = 1;
            }

            foreach ($imagePaths as $imagePath) {
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image = $imagePath;
                $productImage->save();
                $flag = 1;
            }
        }

        if ($flag) {
            return redirect()->route('products')->with('success', 'Product updated successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function Imagedelete(Request $request)
    {
        $id = $request->input('id');
        $image = $request->input('image');

        $productImage = ProductImage::where('id', $id)
            ->where('image', $image)
            ->first();

        if ($productImage) {
            $imagePath = 'public/products-images/' . $productImage->image;
            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }

            $productImage->delete();

            return response()->json(['status' => 'success', 'message' => 'Image deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Image not found.']);
        }
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return back()->with('fail', 'Product not found');
        } else {
            $images = ProductImage::where('product_id', '=', $id)->get();
            foreach ($images as $image) {
                $imagePath = 'public/products-images/' . $image->image;
                if (Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }
                $image->delete();
            }
        }

        if ($product->delete()) {
            return redirect()->route('products')->with('success', 'Product deleted successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function productVariant(Request $request, $id)
    {
        $product = Product::find($id);
        // $product_images = ProductImage::where('product_id', '=', $product->id)->select('image', 'id')->get();
        $categories = Category::all();
        $colors = ProductColor::all();
        $brands = Brand::all();
        $models = Mode::all();
        $subcategories = Subcategory::where('category_id', '=', $product->category_id)->select('id', 'name')->get();
        return view('admin.product-variant', compact(['product', 'categories', 'colors', 'subcategories', 'brands', 'models']));
    }

    public function productVariantStore(Request $request)
    {

        if ($slug_exist = Product::where('slug', '=', $request->slug)->get()) {
            $slug = $request->slug . rand(1, 9999);
        } else {
            $slug = $request->slug;
            $request->validate([
                'slug' => 'required|string|max:255|unique:products,slug'
            ]);
        }

        $request->validate([
            'cat_id' => 'required|integer|exists:categories,id',
            'mcat_id' => 'required|integer|exists:subcategories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'model' => 'required|integer|exists:modes,id',
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|max:255',
            'photo' => 'nullable|array',
            'photo.*' => 'nullable|file|mimes:jpg,jpeg,webp,png,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|regex:/^[A-Za-z0-9\-\$\#]+$/|max:255',
            'quantity' => 'required|integer|min:0',
            'video' => 'nullable|url',
            'details' => 'nullable|string',
            'warrenty_policy' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Log::info(request()->all());
        $firstWord = strtok($request->input('name'), ' ');
        $skuPrefix = strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $firstWord));
        $uniqueIdentifier = rand(10000000, 99999999);

        $sku = ($skuPrefix . '-' . $uniqueIdentifier);

        $headingData = [];

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'heading') === 0) {
                $headingIndex = str_replace('heading', '', $key);
                $headingName = $value;

                $keys = $request->input("key-$headingIndex", []);
                $values = $request->input("value-$headingIndex", []);

                $keyValuePairs = [];
                foreach ($keys as $index => $key) {
                    if (!empty($key) && isset($values[$index]) && !empty($values[$index])) {
                        $keyValuePairs[$key] = $values[$index];
                    }
                }

                if (!empty($keyValuePairs)) {
                    $headingData[$headingName] = $keyValuePairs;
                }
            }
        }

        $jsonData = json_encode($headingData);

        $flag = 0;
        $product = new Product();
        $product->name = $request->input('name');
        $product->color = $request->input('color');
        $product->sku = $sku;
        $product->variant_of = $request->input('p_id');
        $product->pro_specification = $jsonData;
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->video = $request->input('video');
        $product->model_id = $request->input('model');
        $product->details = $request->input('details');
        $product->warranty_policy = $request->input('warrenty_policy');
        $product->category_id = $request->input('cat_id');
        $product->subcategory_id = $request->input('mcat_id');
        $product->brand_id = $request->input('brand_id');
        $product->slug = $slug;
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        $product->status = $request->input('status');
        if ($product->save()) {

            $imagePaths = [];

            if ($request->hasFile('photo')) {
                foreach ($request->file('photo') as $image) {
                    $imagePath = microtime(true) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/products-images', $imagePath);

                    $imagePaths[] = $imagePath;
                }
            } else {
                $flag = 1;
            }

            foreach ($imagePaths as $imagePath) {
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image = $imagePath;
                $productImage->save();
                $flag = 1;
            }
        }

        if ($flag) {
            return redirect()->route('products')->with('success', 'Product Variant added successfully!');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function allProducts()
    {
        $products = Product::all();
        return view('spare-stream.category', compact('products'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', '=', $slug)->first();
        if (!$product) {
            return abort(404, 'Product not found');
        }
        $product_spec = !empty($product->pro_specification)
            ? json_decode($product->pro_specification, true)
            : [];

        $product_images = ProductImage::where('product_id', '=', $product->id)->get();

        // $product_variant = Product::where('variant_of', $product->id)->get();
        $color_variant_ids = Product::where('variant_of', $product->id)
            ->select('color', 'slug', 'id')
            ->get();

        $color_variant_colors = [];

        foreach ($color_variant_ids as $c) {
            array_push($color_variant_colors, $c->color);
        }
        $product_colors = ProductColor::whereIn('id', $color_variant_colors)->get();

        $merged_array = [];

        foreach ($color_variant_ids as $variant) {
            $matching_color = $product_colors->firstWhere('id', $variant->color);

            if ($matching_color) {

                $merged_array[] = [
                    'product_id' => $variant->id,
                    'color' => $variant->color,
                    'slug' => $variant->slug,
                    'color_name' => $matching_color->color_name,
                    'color_code' => $matching_color->color_code,
                ];
            }
        }

        // dd($merged_array);

        return view('spare-stream.detail', compact('product', 'product_images', 'product_spec', 'merged_array'));
    }

    public function modelProducts($slug) {}

    public function productDetails($slug)
    {
        $models = Mode::where('slug', $slug)->first();

        $display_id = Subcategory::where('name', 'like', '%display%')->pluck('id');
        $housing_id = Subcategory::where('name', 'like', '%hous%')->pluck('id');
        $battery_id = Subcategory::where('name', 'like', '%battery%')->pluck('id');

        $display_products = Product::with('images')
            ->where('model_id', $models->id)
            ->where('subcategory_id', $display_id)
            ->get();

        $housing_products = Product::with('images')
            ->where('model_id', $models->id)
            ->where('subcategory_id', $housing_id)
            ->get();

        $battery_products = Product::with('images')
            ->where('model_id', $models->id)
            ->where('subcategory_id', $battery_id)
            ->get();

        return view('spare-stream.search-product-type', compact('models', 'display_products', 'housing_products', 'battery_products'));
    }

    public function brandModel($brand, $slug)
    {
        $models = Mode::where('slug', $slug)->first();
        $display = SpareCategory::where('model_id', $models->id)
            ->where('spare_name', 'Display & Screens for')
            ->get();

        $Housing = SpareCategory::where('model_id', $models->id)
            ->where('spare_name', 'Body & Housings for')
            ->get();

        $battery = SpareCategory::where('model_id', $models->id)
            ->where('spare_name', 'Battery for')
            ->get();

        // $display_id = Subcategory::where('name', 'like', '%display%')->pluck('id');
        // $housing_id = Subcategory::where('name', 'like', '%hous%')->pluck('id');
        // $battery_id = Subcategory::where('name', 'like', '%battery%')->pluck('id');
        // $subcategories = Subcategory::all();
        // $display = [];
        // $Housing = [];
        // $battery = [];
        // foreach ($subcategories as $s) {
        //     // First, check if the name is one of the restricted names
        //     if ($s->name == 'Touch Screen' || $s->name == 'LCD' || $s->name == 'Front Glass') {
        //         // Check if this name is already in the $display array
        //         $exists = false;
        //         foreach ($display as $item) {
        //             if ($item['name'] == $s->name) {
        //                 $exists = true;
        //                 break;
        //             }
        //         }

        //         // Only add if it doesn't exist in the array
        //         if (!$exists) {
        //             $display[] = [
        //                 'name' => $s->name,
        //                 'image' => $s->image,
        //                 'slug' => $s->slug,
        //             ];
        //         }
        //     }

        //     // if (!in_array($display, ['Touch Screen', 'LCD', 'Front Glass'])) {
        //     //     // Add the item to the display array if not already present
        //     //     $display[] = [
        //     //         'name' => $s->name,
        //     //         'image' => $s->image,
        //     //         'slug' => $s->slug,
        //     //     ];
        //     // }

        //     if ($s->name == 'Housing' || $s->name == 'Back Cover' || $s->name == 'Camera Lens' || $s->name == 'Volume Button Outer' || $s->name == 'LCD Frame Middle Chassis') {
        //         $Housing[] = [
        //             'name' => $s->name,
        //             'image' => $s->image,
        //             'slug' => $s->slug,
        //         ];
        //     }

        //     if ($s->name == 'Battery') {
        //         $battery[] = [
        //             'name' => $s->name,
        //             'image' => $s->image,
        //             'slug' => $s->slug,
        //         ];
        //     }
        // }

        // $display_products = Product::with('images')
        //     ->where('model_id', $models->id)
        //     ->where('subcategory_id', $display_id)
        //     ->get();

        // $housing_products = Product::with('images')
        //     ->where('model_id', $models->id)
        //     ->where('subcategory_id', $housing_id)
        //     ->get();

        // $battery_products = Product::with('images')
        //     ->where('model_id', $models->id)
        //     ->where('subcategory_id', $battery_id)
        //     ->get();

        return view('spare-stream.search-product-type', compact('models', 'display', 'Housing', 'battery'));
    }

    public function showByBrand($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();

        $models = Mode::where('brand_id', $brand->id)->get();
        // dd($models);
        // $products = Product::with('images')
        //     ->where('brand_id', $brand->id)
        //     ->get();

        // return view('spare-stream.products-by-brand', compact('brand', 'models'));

        return view('spare-stream.search-brands', compact('brand', 'models'));
    }

    public function searchModel($slug, $model)
    {
        // Fetch the subcategory ID based on the slug
        $submodel_id = SpareCategory::where('slug', $slug)->pluck('id')->first();
        // dd($submodel_id);

        $model_for_show = Mode::where('name', $model)->first();
        $models = Mode::where('name', $model)->pluck('id')->first();
        if (!$models) {
            dd('Model not found');
        }

        $products = Product::with('images')
            ->where('model_id', $models)
            ->where('submodel_id', $submodel_id)
            ->get();

        if (!empty($products)) {
            foreach ($products as $p) {
                $brand_id = $p->brand_id;
            }
        }

        if (!empty($brand_id)) {
            $brand = Brand::find($brand_id);
        } else {
            $brand = '';
        }

        $subcatego = Subcategory::all();
        $submodel = SpareCategory::all();
        $subcategory = $subcatego->merge($submodel);

        return view('spare-stream.search', compact('products', 'model_for_show', 'subcategory', 'brand', 'submodel_id'));
    }

    public function filterProducts(Request $request)
    {
        $selectedCategories = $request->input('subcategories');
        $model = $request->input('model');

        // Fetch the model instance based on the name
        $model_for_show = Mode::where('name', $model)->first();
        $models = Mode::where('name', $model)->pluck('id')->first();

        if (!$models) {
            return response()->json(['error' => 'Model not found'], 404);
        }

        // $products = Product::with('images')
        //     ->where('model_id', $models)
        //     ->whereIn('subcategory_id', $selectedCategories) // Filter by selected categories
        //     ->get();

        $products = Product::with('images')
            ->where('model_id', $models)
            ->where(function ($query) use ($selectedCategories) {
                $query->whereIn('subcategory_id', $selectedCategories)
                    ->orWhereIn('submodel_id', $selectedCategories);
            })
            ->get();


        // Prepare product data for AJAX response
        $productsData = $products->map(function ($item) {
            return [
                'name' => $item->name,
                'price' => number_format($item->price, 2),
                'image_url' => $item->images->isNotEmpty() ? asset('storage/products-images/' . $item->images->first()->image) : null,
                'details_url' => route('product.details', ['slug' => $item->slug]),
                'images' => $item->images
            ];
        });

        // Return the products data as a JSON response
        return response()->json(['products' => $productsData]);
    }

    public function variantProduct($slug)
    {

        $product = Product::where('slug', $slug)
            ->first();
        // dd($products);

        if (!$product) {
            return abort(404, 'Product not found');
        }
        $product_spec = !empty($product->pro_specification)
            ? json_decode($product->pro_specification, true)
            : [];

        $product_images = ProductImage::where('product_id', '=', $product->id)->get();

        $color_variant_ids = Product::where('variant_of', $product->variant_of)
            ->select('color', 'slug', 'id')
            ->get();

        $color_variant_colors = [];

        foreach ($color_variant_ids as $c) {
            array_push($color_variant_colors, $c->color);
        }

        $product_colors = ProductColor::whereIn('id', $color_variant_colors)->whereNotIn('id', [$product->color])->get();

        $merged_array = [];

        foreach ($color_variant_ids as $variant) {
            $matching_color = $product_colors->firstWhere('id', $variant->color);

            if ($matching_color) {

                $merged_array[] = [
                    'product_id' => $variant->id,
                    'color' => $variant->color,
                    'slug' => $variant->slug,
                    'color_name' => $matching_color->color_name,
                    'color_code' => $matching_color->color_code,
                ];
            }
        }

        return view('spare-stream.detail', compact('product', 'product_images', 'merged_array', 'product_spec'));
    }
}
