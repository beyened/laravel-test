<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
<<<<<<< HEAD
     * Get all of the tags for the post.
=======
     * Get all the tags for the video.
>>>>>>> origin/master
     */
    public function tags(){
        return $this->morphToMany(Tags::class, 'taggable');
    }
<<<<<<< HEAD
=======

>>>>>>> origin/master
}
