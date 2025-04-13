<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingInformation extends Model
{
    use HasFactory;

    protected $table = 'shipping_information';

    protected $fillable = [
        'product_id',
        'info'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
