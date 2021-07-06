<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image'
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected static function booted() {
        static::creating(function($category){
            $category->slug = Str::slug($category->name);
        });
    }
    
    public function products()
    {
        return $this->hasMany(related: Product::class);
    }        

    // Método utilizado antes para setar o campo slug
    // public function setSlugAttribute($slug)
    // {
    //     $this->attributes['slug'] = Str::slug($slug);
    // }      
}
