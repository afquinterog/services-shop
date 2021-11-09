<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

    public function getActualLogoAttribute()
    {
        if ($this->logo) {
            return Storage::disk('s3')->temporaryUrl($this->logo, now()->addMinutes(5));
        }

        return "https://ui-avatars.com/api/?rounded=true&name=" . $this->name;
    }
}
