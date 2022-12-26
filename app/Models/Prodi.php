<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function labs()
    {
        return $this->hasMany(Lab::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function galery(){
        return $this->hasMany(Galery::class);
    }
}
