<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (request()->routeIs('informatika.home')){
            $prodi = 'Teknik Informatika';
            $title = 'Informatika';
            $active = 'it';
        }elseif(request()->routeIs('sipil.home')){
            $title = 'Sipil';
            $prodi = 'Teknik Sipil';
            $active = 'sipil';
        }
        return view('front.home',[
            'prodi' => $prodi,
            'title' => $title,
            'active' => $active
        ]);
    }
}
