<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        if (request()->routeIs('informatika.about')){
            $title = 'Informatika';
            $active = 'it_about';
        }elseif(request()->routeIs('sipil.about')){
            $title = 'Sipil';
            $active = 'sipil_about';
        }
        return view('front.about',[
            'title' => $title,
            'active' => $active
        ]);
    }
}
