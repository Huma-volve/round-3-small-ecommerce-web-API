<?php

namespace App\Http\Resources;

use App\Models\Products\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $baseData = [
            "id" => $this->id,
            "title" => $this->title,
            "price" => $this->price,
            "thumbnail" => $this->thumbnail,
            "fit" => $this->fit,
            "categories" => $this->categories->pluck('name'),
            "subcategories" => $this->subcategories->pluck('name'),
        ];

        if ($request->routeIs('products.show')) {
            $baseData += [
                "details" => ProductDetailResource::collection($this->details),
                "shipping_information" => $this->shippingInformation->pluck('info'),
                "reviews" => ReviewResource::collection($this->reviews),
                "images" => $this->images->pluck('image_url'),
            ];
        }
    
        return $baseData;
    }
}
