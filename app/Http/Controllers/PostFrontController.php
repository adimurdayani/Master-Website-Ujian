<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostFrontController extends Controller
{
    public function index()
    {
        if (request()->routeIs('informatika.posts')){
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        
        if(request('author')) {
            $author = User::firstWhere('user_name', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('front.posts', [
            "title" => "Semua Article". $title,
            "active" => 'it_posts',
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->where('prodi_id', 1)->where('category_id', 1)->paginate(7)->withQueryString()
        ]);
    }elseif (request()->routeIs('sipil.posts')) {
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        
        if(request('author')) {
            $author = User::firstWhere('user_name', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('front.posts', [
            "title" => "Semua Article". $title,
            "active" => 'sipil_posts',
            "posts" =>  Post::latest()->filter(request(['search', 'category', 'author']))->where('prodi_id', 2)->where('category_id', 1)->paginate(7)->withQueryString()
        ]);
}


}

    public function show(Post $post)
    {
        if (request()->routeIs('informatika.post')) {
            return view('front.post', [
                "title" => "Article Detail",
                "active" => 'it_posts',
                "post" => $post
            ]);
        } elseif (request()->routeIs('sipil.post')) {
            return view('front.post', [
                "title" => "Article Detail",
                "active" => 'sipil_posts',
                "post" => $post
            ]);
        }
        
    }
}
