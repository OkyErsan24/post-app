<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $hidden = ['id'];
    protected $fillable = ['title','slug','image'];

    public function posts(){
        return $this->hasMany(Post::class);
    }    
}
