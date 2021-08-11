<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function getDateForHumansAttribute()
    {
        return $this->created_at->format('d M Y');
    }
}
