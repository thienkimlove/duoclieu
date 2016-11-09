<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    protected $fillable = [
        //general

        'title',
        'seo_title',
        'slug',
        'desc',
        'keywords',
        'content',
        'image',
        'status',
        'views',

        //special
        'avatar',
        'gender',
        'person',
        'address'
    ];

    protected $dates = ['created_at', 'updated_at'];
    //
}
