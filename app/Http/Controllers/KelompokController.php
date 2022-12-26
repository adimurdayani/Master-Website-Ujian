<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class KelompokController extends Controller
{
    public function index(){
        if (request()->routeIs('informatika.kelompoks')){
            $title = 'Daftar Kelompok Praktikum & Asistensi';
            $prodi = 'Teknik Informatika';
            $active = 'it_kelompok';
            return view('front.kelompoks',[
                'prodi' => $prodi,
                'title' => $title,
                'active' => $active,
                "posts" => Post::latest()->where('category_id',4)->where('prodi_id',1)->paginate(7)->WithQueryString()
            ]);
        }elseif(request()->routeIs('sipil.kelompoks')){
            $title = 'Daftar Kelompok Praktikum & Asistensi';
            $prodi = 'Teknik Sipil';
            $active = 'sipil_kelompok';
            return view('front.kelompoks',[
                'prodi' => $prodi,
                'title' => $title,
                'active' => $active,
                "posts" => Post::latest()->where('category_id',4)->where('prodi_id',2)->paginate(7)->WithQueryString() 
            ]);
        }
    }

    public function show(Post $post)
    {
        if (request()->routeIs('informatika.kelompok')) {
            return view('front.kelompok', [
                "title" => "Single Post",
                "active" => 'it_kelompok',
                "post" => $post
            ]);
        } elseif (request()->routeIs('sipil.kelompok')) {
            return view('front.kelompok',[
                "title" => "Single Post",
                "acitve" => 'sipil_struktur',
                "post" => $post
            ]);
        }
    }
}
