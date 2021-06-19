<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class StuffController extends Controller
{
    public function index()
    {
        $category = Category::paginate(12);
        return $this->paginate($category);
    }

    public function productOfCategory($id)
    {
        $category = Category::findOrFail($id);
        $product = Product::where('categories_id', $category->id)->paginate();

        $product->load('category', 'galleries');

        return $this->paginate($product);
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);
        return $this->response($product);
    }

    public function product()
    {
        $product = Product::paginate();
        $product->load('galleries');
        return $this->paginate($product);
    }
}
