<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getLinkedRouteAttribute(): string
    {

        if (!$this->route) {
            return Storage::disk('s3')->url('product-image-placeholder.gif');
        }

        //return Storage::disk('s3')->url($this->route);

        return  Storage::disk('s3')->temporaryUrl(
            $this->route,
            now()->addMinutes(5)
        );
    }
}
