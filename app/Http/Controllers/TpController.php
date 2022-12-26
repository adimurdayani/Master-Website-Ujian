<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TpController extends Controller
{
    public function index(){
        if (request()->routeIs('informatika.tps')) {
            $title = 'Tugas Pendahuluan Laboratorium';
            $prodi = 'Teknik Informatika';
            $active = 'it';
            return view('front.tps', [
                'prodi' => $prodi,
                'title' => $title,
                'active' => $active,
                "posts" => Post::latest()->where('category_id', 2)->where('prodi_id', 1)->paginate(7)->withQueryString()
            ]);
        } elseif(request()->routeIs('sipil.tps')) {
            $title = 'Tugas Pendahuluan Laboratorium';
            $prodi = 'Teknik Sipil';
            $active = 'sipil';
            return view('front.tps', [
                'prodi' => $prodi,
                'title' => $title,
                'active' => $active,
                "posts" => Post::latest()->where('category_id', 2)->where('prodi_id', 2)->paginate(7)->withQueryString()
            ]);
        }
        
    }

    public function show(Post $post)
    {
        if (request()->routeIs('informatika.tp')) {
            return view('front.tp', [
                "title" => "Single Post",
                "active" => 'it',
                "post" => $post
            ]);
        } elseif (request()->routeIs('sipil.tp')) {
            return view('front.tp', [
                "title" => "Single Post",
                "active" => 'sipil',
                "post" => $post
            ]);
        }
        
    }
}
