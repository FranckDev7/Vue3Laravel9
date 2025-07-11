<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()
            ->whereActive(true) // where('active', true) syntaxe longue
            ->take(16)
            ->get();

        return view('products.index', compact('products'));
    }
}
