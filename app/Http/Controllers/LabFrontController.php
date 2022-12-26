<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabFrontController extends Controller
{
    public function index(){
        if (request()->routeIs('informatika.labs')){
            $title = 'Informatika';
            $prodi = 'Teknik Informatika';
            $active = 'it';
        return view('front.labs',[
            'prodi' => $prodi,
            'title' => $title,
            'active' => $active,
            'labs' => Lab::all()->Where('prodi_id', 1)
        ]);
    }elseif(request()->routeIs('sipil.labs')){
        $title = 'Sipil';
        $prodi = 'Teknik Sipil';
        $active = 'sipil';
        return view('front.labs',[
            'prodi' => $prodi,
            'title' => $title,
            'active' => $active,
            'labs' => Lab::all()->Where('prodi_id', 2)
        ]);
        }
    }
}
