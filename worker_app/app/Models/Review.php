<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $guarded = false;


    public function reviewable()
    {
        return $this->morphTo();
    }
}
