<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
     * Get all of the tags for the post.
     */
    public function tags(){
        return $this->morphToMany(Tags::class, 'taggable');
    }
}
