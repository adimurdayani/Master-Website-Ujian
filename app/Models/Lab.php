<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Lab extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
