<?php


namespace App\Repositories\Contracts;


interface MarketplaceRepository
{
    public function categories();

    public function vendors();

    public function get(int $itemsPerPage, string $order, string $search = '', $category = null, $vendor = null);
}
