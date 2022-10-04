<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function posts(){
        $this->morphedByMany(Post::class, 'taggable');
    }

    public function video(){
        $this->morphedByMany(Video::class, 'taggable');
    }
}
