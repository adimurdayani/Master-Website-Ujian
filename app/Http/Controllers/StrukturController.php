<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index(){
        if (request()->routeIs('informatika.strukturs')){
            $title = 'Struktur Organisasi Laboratorium';
            $prodi = 'Teknik Informatika';
            $active = 'it_struktur';
            return view('front.strukturs',[
                'prodi' => $prodi,
                'title' => $title,
                'active' => $active,
                "posts" => Post::latest()->where('category_id', 5)->where('prodi_id', 1)->paginate(7)->withQueryString()
            ]);
        }elseif(request()->routeIs('sipil.strukturs')){
            $title = 'Struktur Organisasi Laboratorium';
            $prodi = 'Teknik Sipil';
            $active = 'sipil_struktur';
            return view('front.strukturs',[
                'prodi' => $prodi,
                'title' => $title,
                'active' => $active,
                "posts" => Post::latest()->where('category_id', 5)->where('prodi_id', 2)->paginate(7)->withQueryString()
            ]);
        }
    }

    public function show(Post $post)
    {
        if (request()->routeIs('informatika.struktur')) {
            return view('front.struktur', [
                "title" => "Single Post",
                "active" => 'it_struktur',
                "post" => $post
            ]);
        } elseif (request()->routeIs('sipil.struktur')) {
            return view('front.struktur', [
                "title" => "Single Post",
                "active" => 'sipil_struktur',
                "post" => $post
            ]);
        }
        
    }
}
