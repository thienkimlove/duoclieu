<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
        'parent_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * parent of this category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    /**
     * sub of this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');

    }
    public function getParentListAttribute()
    {
        return array(0 => 'Choose Parent Categories') + Category::where('parent_id', 0)->pluck('title', 'id')->all();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public function getIndexPostsAttribute()
    {

        $showIndex = Module::where('key_type', 'show_on_index')->where('key_content', 'posts')->pluck('key_value')->all();


        if ($this->subCategories->count() == 0) {
            return Post::where('category_id', $this->id)
                ->whereIn('id', $showIndex)
                ->where('status', true)
                ->latest('updated_at')
                ->limit(5)
                ->get();
        } else {
            return Post::whereIn('category_id', $this->subCategories->pluck('id')->all())
                ->where('status', true)
                ->whereIn('id', $showIndex)
                ->latest('updated_at')
                ->limit(5)
                ->get();
        }

    }

    public function getIndexLongPostsAttribute()
    {

        $showIndex = Module::where('key_type', 'show_on_index')->where('key_content', 'posts')->pluck('key_value')->all();


        if ($this->subCategories->count() == 0) {
            return Post::where('category_id', $this->id)
                ->whereIn('id', $showIndex)
                ->where('status', true)
                ->latest('updated_at')
                ->limit(10)
                ->get();
        } else {
            return Post::whereIn('category_id', $this->subCategories->pluck('id')->all())
                ->where('status', true)
                ->whereIn('id', $showIndex)
                ->latest('updated_at')
                ->limit(10)
                ->get();
        }

    }
}
