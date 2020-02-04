<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    protected $table = 'categories';
    protected $guarded = [];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function subcategories(){

        return $this->hasMany('App\Category','parent_id','id');
    }

    public function category(){

        return $this->belongsTo('App\Category','parent_id','id');
    }
}
