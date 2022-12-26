<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(){
        if (request()->routeIs('informatika.jadwals')){
            $title = 'Jadwal Praktikum & Asistensi';
            $prodi = 'Teknik Informatika';
            $active = 'it_jadwal';
            return view('front.jadwals',[
                'prodi' => $prodi,
                'title' => $title,
                'active' => $active,
                "posts" => Post::latest()->where('category_id',3)->where('prodi_id',1)->paginate(7)->WithQueryString()
            ]);
        }elseif(request()->routeIs('sipil.jadwals')){
            $title = 'Jadwal Praktikum & Asistensi';
            $prodi = 'Teknik Sipil';
            $active = 'sipil_jadwal';
            return view('front.jadwals',[
                'prodi' => $prodi,
                'title' => $title,
                'active' => $active,
                "posts" => Post::latest()->where('category_id',3)->where('prodi_id',2)->paginate(7)->WithQueryString() 
            ]);
        }
    }

    public function show(Post $post)
    {
        if (request()->routeIs('informatika.jadwal')) {
            return view('front.jadwal', [
                "title" => "Single Post",
                "active" => 'it_jadwal',
                "post" => $post
            ]);
        } elseif (request()->routeIs('sipil.jadwal')) {
            return view('front.jadwal',[
                "title" => "Single Post",
                "acitve" => 'sipil_struktur',
                "post" => $post
            ]);
        }
    }
}


