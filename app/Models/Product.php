<?php

namespace App\Models;

use App\Traits\BelongsToCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    use BelongsToCompany;

    protected $with = ['categories', 'images'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('order');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getFirstImage(): string
    {
        $route = optional($this->images()->first())->route;

        if (!$route) {
            return Storage::disk('s3')->url('product-image-placeholder.gif');
        }

        return Storage::disk('s3')->temporaryUrl($route, now()->addMinutes(5));
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price,0, '.', '.');
    }

    public function getCategoriesDescriptionAttribute(): string
    {
        return $this->categories()->get()->map(function ($category) {
            return $category->name;
        })->join(', ');
    }

    public function slideImages()
    {
        $mainImage = $this->images()->first();
        return $this->images()->WhereNotIn('id', [$mainImage->id]);
    }

    public function similarProducts()
    {
       return Category::whereIn('id', $this->categories()->pluck('categories.id'))->get()->flatMap(function ($category) {
            return $category->products()->get();
        })->filter(function ($product) {
            return $product->id !== $this->id;
        })->take(6);
    }
}
