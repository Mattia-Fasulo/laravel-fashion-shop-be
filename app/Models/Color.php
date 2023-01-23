<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Color extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
