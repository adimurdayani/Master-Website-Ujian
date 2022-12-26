<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Lab;
use App\Models\Post;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['permission:posts.index|posts.create|posts.edit|posts.delete']);
    }

    public function index()
    {
        $currentUser = User::findOrFail(Auth()->id());
        if($currentUser->hasRole('admin')){
            $posts = Post::latest()->when(request()->q, function($posts) {
                $posts = $posts->where('title', 'like', '%'. request()->q . '%');
            })->paginate(10);
        }elseif($currentUser->hasRole('teacher')){
            $posts = Post::latest()->where('prodi_id',auth()->user()->prodi_id)->when(request()->q, function($posts) {
                $posts = $posts->where('title', 'like', '%'. request()->q . '%');
            })->paginate(10);
        }

        $category = new Category();
        $prodi = new Prodi();
        $lab = new Lab();
        $user = new User();

        return view('posts.index', compact('posts', 'category', 'lab', 'prodi', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $labs = Lab::where('prodi_id',auth()->user()->prodi_id)->get();
        // $images = Image::latest()->get();
        return view('posts.create', compact('categories', 'labs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'lab_id' => 'required',
            'image' => 'image|mimes:jpg,bmp,png',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['role_id'] = auth()->user()->role_id;
        $validatedData['prodi_id'] = auth()->user()->prodi_id;
        $validatedData['exerpt'] = Str::limit(strip_tags($request->body), 100);

        Post::create($validatedData);
        if($validatedData){
            //redirect dengan pesan sukses
            return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('posts.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $posts = $post->where('slug', $post->slug)->get();
        
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $labs = Lab::where('prodi_id',auth()->user()->prodi_id)->get();
        $posts = $post->where('slug', $post->slug)->get();
        
        return view('posts.edit', compact('post','categories','labs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'lab_id' => 'required',
            'image' => 'image|file|min:100',
            'body' => 'required'
        ];


        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }


        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['exerpt'] = Str::limit(strip_tags($request->body), 100);

        Post::where('id', $post->id)
            ->update($validatedData);

        if($validatedData){
            //redirect dengan pesan sukses
            return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('posts.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();


        if($post){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
