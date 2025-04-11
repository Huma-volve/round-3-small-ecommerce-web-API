<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Products\Product;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {
        // Filters
        $category = $request->get('category');
        $subCategory = $request->get('subcategory');

        // Products with filters
        $products = Product::with(['categories', 'subcategories'])
            ->when($category, function ($query) use ($category) {
                $query->whereHas('categories', function ($q) use ($category) {
                    $q->where('name', $category);
                });
            })
            ->when($subCategory, function ($query) use ($subCategory) {
                $query->whereHas('subcategories', function ($q) use ($subCategory) {
                    $q->where('name', $subCategory);
                });
            })
            ->get();

        return $this->successResponse(
            ProductResource::collection($products),
            "Fetched successfully"
        );
    }


    public function show($id)
    {
        $product = Product::with(['categories', 'subcategories'])->find($id);

        if (! $product) {
            return $this->errorResponse("Product not found", 404);
        }

        return $this->successResponse(
            new ProductResource($product),
            "Fetched successfully"
        );
    }
}
