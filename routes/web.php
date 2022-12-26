<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\GaleryControllerBck;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LabFrontController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostFrontController;
use App\Http\Controllers\ResponController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\TpController;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', [
        "title" => 'UNANDA'
    ]);
});

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);

// Home
    Route::get('/informatika', [HomeController::class, 'index'])->name('informatika.home');
    Route::get('/sipil',       [HomeController::class, 'index'])->name('sipil.home');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//backend
    Route::group(['middleware' => 'auth'], function(){

        //dashboard
        Route::get('/dashboard',       [DashboardController::class, 'index'])->name('dashboard.index');

        //permissions
        Route::resource('permissions', PermissionController::class)->only([
            'index'
        ]);

        //roles
        Route::resource('roles',       RoleController::class)->except([
            'show'
        ]);

        //users
        Route::resource('users',       UserController::class)->except([
            'show'
        ]);

        //images
        Route::resource('images',      ImageController::class)->except([
            'show', 'create', 'edit', 'update'
        ]);

        //galeries
        Route::resource('galeries',      GaleryControllerBck::class)->except([
            'show', 'create', 'edit', 'update'
        ]);

        //videos
        Route::resource('videos',      VideoController::class)->except([
            'show', 'create', 'edit', 'update'
        ]);

        //audios
        Route::resource('audios',      AudioController::class)->except([
            'show', 'create', 'edit', 'update'
        ]);

        //documents
        Route::resource('documents',   DocumentController::class)->except([
            'show', 'create', 'edit', 'update'
        ]);

        //subjects
        Route::resource('subjects',    SubjectController::class)->except([
            'show', 'create', 'edit', 'update'
        ]);

        //labs
        Route::resource('labs',        LabController::class)->except([
            'show', 'create', 'edit', 'update'
        ]);

        //questions
        Route::resource('questions',   QuestionController::class)->except([
            'show'
        ]);

        //categories
        Route::resource('categories',  CategoryController::class)->except([
            'show', 'create', 'edit', 'update'
        ]);

        //posts
        Route::resource('posts',       PostController::class);
        Route::get('posts/checkSlug',  [PostController::class, 'checkSlug']);

        //exams
        Route::resource('exams',                                ExamController::class); 
        Route::get('/exams/result/{score}/{user_id}/{exam_id}', [ExamController::class, 'result'])->name('exams.result');
        Route::get('/exams/start/{id}',                         [ExamController::class, 'start'])->name('exams.start');
        Route::get('exams/student/{id}',                        [ExamController::class, 'student'])->name('exams.student');
        Route::put('exams/assign/{id}',                         [ExamController::class, 'assign'])->name('exams.assign');
        Route::get('/exams/review/{user_id}/{exam_id}',         [ExamController::class, 'review'])->name('exams.review');
    });

//end of backend

//frontend

    //post it
        Route::get('/informatika/posts',                    [PostFrontController::class,    'index'])->name('informatika.posts');
        Route::get('/informatika/posts/{post:slug}',        [PostFrontController::class,    'show'])->name('informatika.post');
    //post sipil
        Route::get('/sipil/posts',                          [PostFrontController::class,    'index'])->name('sipil.posts');
        Route::get('/sipil/posts/{post:slug}',              [PostFrontController::class,    'show'])->name('sipil.post');

    //struktur it
        Route::get('/informatika/strukturs',                [StrukturController::class,     'index'])->name('informatika.strukturs');
        Route::get('/informatika/strukturs/{post:slug}',    [StrukturController::class,     'show'])->name('informatika.struktur');
    //struktur sipil
        Route::get('/sipil/strukturs',                      [StrukturController::class,     'index'])->name('sipil.strukturs');
        Route::get('/sipil/strukturs/{post:slug}',          [StrukturController::class,     'show'])->name('sipil.struktur');
    //end struktur

    //sarana it
        Route::get('/informatika/saranas',                  [SaranaController::class,       'index'])->name('informatika.saranas');
        Route::get('/informatika/saranas/{post:slug}',      [SaranaController::class,       'show'])->name('informatika.sarana');
    //sarana sipil
        Route::get('/sipil/saranas',                        [SaranaController::class,       'index'])->name('sipil.saranas');
        Route::get('/sipil/saranas/{post:slug}',            [SaranaController::class,       'show'])->name('sipil.sarana');

    //respon
        Route::get('/informatika/respon',                   [ResponController::class,       'index'])->name('informatika.respon');
        Route::get('/sipil/respon',                         [ResponController::class,       'index'])->name('sipil.respon');

    //tentang
        Route::get('/informatika/about',                    [AboutController::class,        'index'])->name('informatika.about');
        Route::get('/sipil/about',                          [AboutController::class,        'index'])->name('sipil.about');

    //galery
        Route::get('/informatika/galeri',                   [GaleryController::class,       'index'])->name('informatika.galeri');
        Route::get('/sipil/galeri',                         [GaleryController::class,       'index'])->name('sipil.galeri');



    //tp it
        Route::get('/informatika/tps',                      [TpController::class,           'index'])->name('informatika.tps');
        Route::get('/informatika/tps/{post:slug}',          [TpController::class,           'show'])->name('informatika.tp');
    //tp sipil
        Route::get('/sipil/tps',                            [TpController::class,           'index'])->name('sipil.tps');
        Route::get('/sipil/tps/{post:slug}',                [TpController::class,           'show'])->name('sipil.tp');

    //jadwal it
        Route::get('/informatika/jadwals',                  [JadwalController::class,       'index'])->name('informatika.jadwals');
        Route::get('/informatika/jadwals/{post:slug}',      [JadwalController::class,       'show'])->name('informatika.jadwal');
    //jadwal sipil
        Route::get('/sipil/jadwals',                        [JadwalController::class,       'index'])->name('sipil.jadwals');
        Route::get('/sipil/jadwals/{post:slug}',            [JadwalController::class,       'index'])->name('sipil.jadwal');

    // kelompok
        Route::get('/informatika/kelompoks',                [KelompokController::class,     'index'])->name('informatika.kelompoks');
        Route::get('/informatika/kelompoks/{post:slug}',    [KelompokController::class,     'show'])->name('informatika.kelompok');

        Route::get('/sipil/kelompoks',                      [KelompokController::class,     'index'])->name('sipil.kelompoks');
        Route::get('/sipil/kelompoks/{post:slug}',          [KelompokController::class,     'show'])->name('sipil.kelompok');

    // lab front
        Route::get('/informatika/labs',                     [LabFrontController::class,     'index'])->name('informatika.labs');
        Route::get('/sipil/labs',                           [LabFrontController::class,     'index'])->name('sipil.labs');

    // pendaftaran
        Route::get('/informatika/pendaftaran',              [PendaftaranController::class,  'index'])->name('informatika.pendaftaran');
        Route::get('/sipil/pendaftaran',                    [PendaftaranController::class,  'index'])->name('sipil.pendaftaran');
//edn of front
