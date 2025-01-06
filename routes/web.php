<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpareCategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    // categories routes 
    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

    Route::get('/categories-add', [CategoryController::class, 'show'])->name('category.add');

    Route::post('/categories-add', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');

    Route::post('/category-edit/{id}', [CategoryController::class, 'update'])->name('category.update');

    Route::get('/category-delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    // sub categories routes

    Route::get('/subcategories', [SubCategoryController::class, 'index'])->name('subcategories');

    Route::get('/subcategories-add', [SubCategoryController::class, 'show'])->name('subcategory.add');

    Route::post('/subcategories-add', [SubCategoryController::class, 'store'])->name('subcategory.store');

    Route::get('/subcategory-edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');

    Route::post('/subcategory-edit/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');

    Route::get('/subcategory-delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');

    // products routes
    Route::post('/product-variant/{id}', [ProductController::class, 'productVariantStore'])->name('product.variant.store');

    Route::get('/product-variant/{id}', [ProductController::class, 'productVariant'])->name('product.variant');

    Route::post('/product-image', [ProductController::class, 'Imagedelete'])->name('product-image.delete');

    Route::get('/products', [ProductController::class, 'index'])->name('products');

    Route::get('/products-add', [ProductController::class, 'show'])->name('product.add');

    Route::post('/products-add', [ProductController::class, 'store'])->name('product.store');

    Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

    Route::post('/product-edit/{id}', [ProductController::class, 'update'])->name('product.update');

    Route::get('/product-delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/get-subcategories/{categoryId}', [SubCategoryController::class, 'getSubcategories'])->name('get.subcategories');

    // product color routes
    Route::get('/color', [ProductColorController::class, 'index'])->name('color');

    Route::get('/color-add', [ProductColorController::class, 'show'])->name('color.add');

    Route::post('/color-add', [ProductColorController::class, 'store'])->name('color.store');

    Route::get('/color-edit/{id}', [ProductColorController::class, 'edit'])->name('color.edit');

    Route::post('/color-edit/{id}', [ProductColorController::class, 'update'])->name('color.update');

    Route::get('/color-delete/{id}', [ProductColorController::class, 'delete'])->name('color.delete');

    // product Brands routes
    Route::get('/brands', [BrandController::class, 'index'])->name('brands');

    Route::get('/brand-add', [BrandController::class, 'show'])->name('brand.add');

    Route::post('/brand-add', [BrandController::class, 'store'])->name('brand.store');

    Route::get('/brand-edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');

    Route::post('/brand-edit/{id}', [BrandController::class, 'update'])->name('brand.update');

    Route::get('/brand-delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

    // product models routes
    Route::get('/get-models/{brandId}', [ModelController::class, 'getModels'])->name('get.models');

    Route::get('/models', [ModelController::class, 'index'])->name('models');

    Route::get('/models-add', [ModelController::class, 'show'])->name('models.add');

    Route::post('/model-add', [ModelController::class, 'store'])->name('model.store');

    Route::get('/model-edit/{id}', [ModelController::class, 'edit'])->name('model.edit');

    Route::post('/model-edit/{id}', [ModelController::class, 'update'])->name('model.update');

    Route::get('/model-delete/{id}', [ModelController::class, 'delete'])->name('model.delete');

    // registered customer routes
    Route::get('/customer', [CustomerController::class, 'index'])->name('customers');

    // orders
    Route::get('/orders', [OrderController::class, 'Order'])->name('orders');

    // submodels
    Route::get('/get-submodels/{modelId}', [SpareCategoryController::class, 'getSubModels'])->name('get.submodels');

    Route::get('/submodels', [SpareCategoryController::class, 'index'])->name('submodels');

    Route::get('/submodels-add', [SpareCategoryController::class, 'show'])->name('submodels.add');

    Route::post('/submodel-add', [SpareCategoryController::class, 'store'])->name('submodel.store');

    Route::get('/submodel-edit/{slug}', [SpareCategoryController::class, 'edit'])->name('submodel.edit');

    Route::post('/submodel-edit/{id}', [SpareCategoryController::class, 'update'])->name('submodel.update');

    Route::get('/submodel-delete/{id}', [SpareCategoryController::class, 'delete'])->name('submodel.delete');
});

Route::get('check', function () {
    return view('spare-stream.invoice');
});

Route::get('/invoice-slip/{id}', [CheckoutController::class, 'invoiceSlip'])->name('invoice.slip');

Route::post('/profile-update', [UserProfileController::class, 'profileUpdate'])->name('profile.updates');

Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place.order');

Route::get('/profile-details', [UserProfileController::class, 'profileDetails'])->name('profile.details');

Route::get('/cart-checkout', [CheckoutController::class, 'checkout'])->name('cart.checkout');

Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');

Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');

Route::get('/show-cart', [CartController::class, 'showCart'])->name('show.cart');

Route::post('/add-cart', [CartController::class, 'addToCart'])->name('add.cart');

Route::get('/variant-product/{slug}', [ProductController::class, 'variantProduct'])->name('variant.product');

Route::get('model-products/{slug}', [ProductController::class, 'modelProducts'])->name('model.products');

Route::get('search-model/{slug}/{model}', [ProductController::class, 'searchModel'])->name('search.model');

Route::get('product-details/{slug}', [ProductController::class, 'productDetail'])->name('product.details');

// Route::get('product-detail/{slug}', [ProductController::class, 'productDetails'])->name('product.detail');

Route::get('product-detail/{slug}', [ProductController::class, 'productDetails'])->name('product.detail');

Route::get('category/{slug}', [CategoryController::class, 'categoryDetail'])->name('category.detail');

Route::get('all-products', [ProductController::class, 'allProducts'])->name('all.products');

Route::get('sub-products/{id}', [HomeController::class, 'SubProducts'])->name('sub.products');

Route::get('spare-products/{slug}', [HomeController::class, 'spareProducts'])->name('spare.products');

// Route::get('/filter-brands', [ProductController::class, 'filterProducts'])->name('filter.products');

Route::get('/filter-brands', [ProductController::class, 'filterProducts'])->name('filter.products');

Route::get('/brand/{slug}', [ProductController::class, 'showByBrand'])->name('brand.products');

Route::get('/{brand}/{slug}', [ProductController::class, 'brandModel'])->name('brand.model');

Route::get('warranty', [HomeController::class, 'warranty'])->name('warranty');

Route::get('support', [HomeController::class, 'support'])->name('support');

Route::get('mobile-directory', [HomeController::class, 'mobileDirectory'])->name('mobile.directory');

Route::get('manual', [HomeController::class, 'manual'])->name('manual');

Route::get('order', [HomeController::class, 'order'])->name('order');

// Route::get('logini', [HomeController::class, 'login']);
// Route::get('signupi', [HomeController::class, 'signup']);
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about.us');
Route::get('/blog', [HomeController::class, 'Blog'])->name('blog');
Route::get('/blog-detail', [HomeController::class, 'blogDetail'])->name('blog.detail');
Route::get('/career', [HomeController::class, 'Career'])->name('career');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/category-small', [HomeController::class, 'categorySmall'])->name('category.small');
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact.us');
Route::get('/customer-contact', [HomeController::class, 'customerContact'])->name('customer.contact');
Route::get('/detail', [HomeController::class, 'Detail'])->name('detail');
Route::get('/e-wallet', [HomeController::class, 'eWallet'])->name('e.wallet');
Route::get('/support', [HomeController::class, 'support'])->name('support');
Route::get('/term-condition', [HomeController::class, 'termCondition'])->name('term.condition');

// don't mismatch 

require __DIR__ . '/auth.php';
