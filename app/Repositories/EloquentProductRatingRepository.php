<?php


namespace App\Repositories;


use App\Models\Product;
use App\Repositories\Contracts\ProductRatingRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentProductRatingRepository implements ProductRatingRepository
{

    public function get(Product $product): Collection
    {
        return $product->ratings()->get();
    }

    public function save(Product $product, int $rate, $message='')
    {
        $product->ratings()->create([
           'rating' => $rate,
            'message' => $message
        ]);
    }

    public function calculate(Product $product): void
    {
        $average = $product->ratings()->get()->map(fn($rating) => $rating->rating)->avg();
        $product->rating = $average;
        $product->save();
    }


}
