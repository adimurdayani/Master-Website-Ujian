<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index(){
        if (request()->routeIs('informatika.pendaftaran')){
            $title = 'Lab Informatika';
            $prodi = 'Teknik Informatika';
            $active = 'it';
            return view('front.pendaftaran',[
                'prodi' => $prodi,
                'title' => $title,
                'active' => $active
            ]);
        }elseif(request()->routeIs('sipil.pendaftaran')){
            $title = 'Lab Sipil';
            $prodi = 'Teknik Sipil';
            $active = 'sipil';
            
            return view('front.pendaftaran',[
                'prodi' => $prodi,
                'title' => $title,
                'active' => $active
            ]);
        }
    }
}
