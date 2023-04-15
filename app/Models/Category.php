<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = [];
    public $timestamps = true;

    public function post() {
        return $this->hasMany(Post::class,'categories_id','id');
    }
}
