<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    public $timestamps = true;

    public function category() {
        return $this->belongsTo(Category::class,'categories_id','id');
    }
}
