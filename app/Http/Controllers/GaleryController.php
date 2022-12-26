<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index(){
        if (request()->routeIs('informatika.galeri')){
            $title = 'Dokumentasi Kegiatan Lab Informatika';
            $active = 'it_galeri';
            return view('front.galery',[
                "title" => $title,
                "active" => $active,
                "galeries" => Galery::latest()->where('prodi_id', 1)->get()->take(3)
            ]);
        }elseif(request()->routeIs('sipil.galeri')){
            $title = 'Dokumentasi Kegiatan Lab Sipil';
            $active = 'sipil_galeri';
            return view('front.galery',[
                "title" => $title,
                "active" => $active,
                "galeries" => Galery::latest()->where('prodi_id', 2)->get()->take(3)
            ]);
        }
    }
}
