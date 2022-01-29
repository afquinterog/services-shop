<?php


namespace App\Repositories;


use App\Models\Product;
use App\Repositories\Contracts\ProductRateRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentProductRateRepository implements ProductRateRepository
{

    public function getRatings(Product $product): Collection
    {
        return $product->ratings()->get();
    }

    public function rate(Product $product, int $rate, $message='')
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
