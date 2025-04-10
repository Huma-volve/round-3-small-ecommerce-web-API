<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {
        // Get all products filtred by category
        $category = $request->get('category');
        $subCategory = $request->get('subCategory');

        $products = Product::with(['categories', 'subcategories'])
            ->whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category);
            })
            ->whereHas('subcategories', function ($query) use ($subCategory) {
                $query->where('name', $subCategory);
            })->get();

        return $this->successResponse($products, "Fetched successfully");
    }

    public function show($id)
    {
        $product = Product::with(['categories', 'subcategories'])->find($id);

        if (! $product) {
            return $this->errorResponse("Product not found", 404);
        }

        return $this->successResponse($product, "Fetched successfully");
    }
}
