<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'options' => 'array',
    ];

    /**
     * Get the category of the item
     *
     * @return \App\Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the tags of the item
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getDateForHumansAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    public function pictureUrl()
    {
        return $this->picture ? Storage::disk('items')->url($this->picture) : '/assets/img/placeholder.jpg';
    }
}
