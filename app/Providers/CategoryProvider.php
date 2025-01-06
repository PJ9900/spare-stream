<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $categories = Category::with('subcategories')->get();
        // Share the grouped categories with all views
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->get();
        } else {
            $cartToken = session('cart_token');
            if ($cartToken) {
                $cart = Cart::where('cart_token', $cartToken)->get();
            } else {
                $cart = collect(); // Empty collection if there's no cart_token
            }
        }

        View::share('categories', $categories);
        View::share('cart', $cart);
    }
}