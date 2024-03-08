<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @mixin Builder
 * Rubric
 */
class Rubric extends Model
{
    use HasFactory;
    protected $fillable = ["title"];
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
