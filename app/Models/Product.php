<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    public static function storeimage($img){
        $url = 'https:'.$img;
        $contents = file_get_contents($url);
        $temp_name = substr($url, strrpos($url, '/') + 1);
        $name = substr($temp_name, 0, strpos($temp_name, '?')) .'.jpg';
        $path = 'images/' . $name;
        Storage::put('images/'.$name, $contents);
        return $path;
    }
}
