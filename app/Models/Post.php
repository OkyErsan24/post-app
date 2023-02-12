<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";

    protected $hidden = [
        'id',
        'pivot',
        'category_id'
    ];
    protected $fillable = ['title' , 'slug' , 'description' , 'image' , 'galery_image' , 'category_id'];

    public function tags(){
        return $this->belongsToMany(Tag::class , 'post_tags');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
