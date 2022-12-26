<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleryControllerBck extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:galeries.index|galeries.create|galeries.delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeries = Galery::latest()->where('prodi_id',auth()->user()->prodi_id)->when(request()->q, function($galeries) {
            $galeries = $galeries->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        $prodi = new Prodi();
        $user = new User();

        return view('galeries.index', compact('galeries', 'prodi', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title'     => 'required',
            'image'     => 'required|mimes:jpg,bmp,png',
            'caption'     => 'required'
        ]);
        
        //upload image
        if($request->file('image')) {
            $validasi['image'] = $request->file('image')->store('galery-image');
        }
        
        $validasi['user_id'] = auth()->user()->id;
        $validasi['prodi_id'] = auth()->user()->prodi_id;

        Galery::create($validasi);
        if($validasi){
            //redirect dengan pesan sukses
            return redirect()->route('galeries.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('galeries.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function show(Galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit(Galery $galery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galery $galery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galery = Galery::findOrFail($id);
        $image= Storage::disk('local')->delete('public/galery-image/'.$galery->image);
        $galery->delete();

        if($galery){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
