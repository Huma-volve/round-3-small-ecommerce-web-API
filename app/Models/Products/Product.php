<?php

namespace App\Models\Products;

use App\Models\Categories\Category;
use App\Models\Categories\Subcategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'thumbnail',
        'fit'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'product_subcategory');
    }

    public function details(): HasMany
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function shippingInformation(): HasMany
    {
        return $this->hasMany(ShippingInformation::class);
    }
}
