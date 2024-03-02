<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 * Rubric
 */
class Rubric extends Model
{
    protected $fillable = ["title"];
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
