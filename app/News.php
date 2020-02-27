<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use sluggable;
    protected $fillable = [
        'headline', 'content','image','category','url',
    ];
    public function sluggable()
    {
        return [
            'url' => [
                'source' => 'headline'
            ]
        ];
    }
    // protected $fillable = [
    //     'headline', 'content','image','category'
    // ];
}
