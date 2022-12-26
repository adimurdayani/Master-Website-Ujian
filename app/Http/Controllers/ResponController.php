<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponController extends Controller
{
    public function index(){
        if (request()->routeIs('informatika.respon')){
            $title = 'Informatika';
            $active = 'it_respon';
        return view('front.respon',[
            'title' => $title,
            'active' => $active
        ]);
    }elseif(request()->routeIs('sipil.respon')){
        $title = 'Sipil';
        $active = 'sipil_respon';
        return view('front.respon',[
            'title' => $title,
            'active' => $active
        ]);
        }
    }
}
