<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin Builder
 * Post
 */
class Post extends Model
{
    use HasFactory;
    protected $fillable = ["title", "content", "rubric_id", "img", "user_id"];
    protected $guarded = ["id", "created_at", "updated_at"];
    public function rubric()
    {
        return $this->belongsTo(Rubric::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function setTitleAttribute($value)
    {
        $this->attributes["title"] = Str::title($value);
    }

    public function getTitleAttribute($value)
    {
        return Str::upper($value);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
