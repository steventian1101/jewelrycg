<?php

namespace App\Models;

use App\Models\Traits\FormatPrices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Product extends Model
{
    use HasFactory, FormatPrices;

    public static $category_list = [
        'Arts',
        'Automotive',
        'Baby',
        'Beauty & Personal Care',
        'Books',
        "Boy's Fashion",
        'Computers',
        'Digital Music',
        'Electronics',
        "Girls' Fashion",
        'Health & Household',
        'Home & Kitchen',
        'Industrial & Scientific',
        'Luggage',
        "Men's Fashion",
        'Movies & TV',
        'Music, CDs & Vinyl',
        'Pet Supplies',
        'Software',
        'Sports & Outdoors',
        'Tools & Home Improvement',
        'Toys & Games',
        'Video Games',
        "Women's Fashion"        
    ];

    protected $fillable = [
        'price',
        'desc',
        'name',
        'category',
        'qty'
    ];

    public static function getPriceInCents(float $price)
    {
        $price *= 100;
        return (int) $price;
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'id_product')->orderBy('id', 'asc');
    }
}
