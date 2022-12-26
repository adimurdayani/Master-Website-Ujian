<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SaranaController extends Controller
{
    public function index(){
        if (request()->routeIs('informatika.saranas')){
            $title = 'Sarana & Prasarana Laboratorium';
            $prodi = 'Teknik Informatika';
            $active = 'it_sarana';
            return view('front.saranas',[
                'prodi' => $prodi,
                'title' => $title,
                'active' => $active,
                "posts" => Post::latest()->where('category_id', 6)->where('prodi_id', 1)->paginate(7)->withQueryString()
            ]);
        }elseif(request()->routeIs('sipil.saranas')){
            $title = 'Sarana & Prasarana Laboratorium';
            $prodi = 'Teknik Sipil';
            $active = 'sipil_sarana';
            
            return view('front.saranas',[
                'prodi' => $prodi,
                'title' => $title,
                'active' => $active,
                "posts" => Post::latest()->where('category_id', 6)->where('prodi_id', 2)->paginate(7)->withQueryString()
            ]);
        }
    }

    public function show(Post $post)
    {
        if (request()->routeIs('informatika.sarana')) {
            return view('front.sarana', [
                "title" => "Single Post",
                "active" => 'it_sarana',
                "post" => $post
            ]);
        } elseif (request()->routeIs('sipil.sarana')) {
            return view('front.sarana', [
                "title" => "Single Post",
                "active" => 'sipil_sarana',
                "post" => $post
            ]);
        }
        
    }
}
