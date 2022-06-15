<?php

namespace App\Http\Controllers\ManytoMany;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $product = new Product();
        $product->name = 'God of War';
        $product->price = 40;

        $product->save();

        $category = Category::find([3, 4]);
        $product->categories()->attach($category);

        return 'Success';
    }

    public function removeCategory(Product $product)
    {
        $category = Category::find(3);

        $product->categories()->detach($category);

        return 'Success';
    }
}
