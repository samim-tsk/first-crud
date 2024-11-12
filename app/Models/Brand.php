<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'description',
        'image_path'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function getImage()
    {
        return asset('storage/'.$this->image_path);
    }

}
