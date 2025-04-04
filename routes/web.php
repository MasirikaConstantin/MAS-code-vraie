<?php

use App\Http\Controllers\AdminControl;
use App\Http\Controllers\AstucesControllers;
use App\Http\Controllers\Blogcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserControl;
use App\Http\Middleware\Authenticate;
use App\Models\Astuce;
use App\Models\Categorie;
use App\Http\Controllers\EnregistrementController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use Spatie\Sitemap\SitemapGenerator;
Route::resource("messages",MessageController::class);
Route::get('/generate-sitemap', function () {
    SitemapGenerator::create('https://mascodeproduct.com')->writeToFile(public_path('sitemap.xml'));
    return 'Sitemap généré avec succès !';
});
Route::get('/', function () {
    return view('index',[
        'posts'=>Post::orderBy("created_at",'desc')->paginate(8)->where('etat','=',0),"recents"=>Post::orderBy('id','desc')->where('etat','=',0)->limit(3)->get(),
        'astuces'=>Astuce::orderBy('id','desc')->where('etat',true)->paginate(6),
        'categories' => Categorie::where('status', 0)->orderBy('titre', 'asc')->get()

    ]);
})->name('index');


Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/contact', function (){
    return view("contact");
})->name("contact");


Route::get('/astuces', [AstucesControllers::class,'index'])->name('astuces');

require __DIR__.'/auth.php';

Route::get('/dashboard' ,[UserControl::class ,'dashboard'])->name('dashboard')->middleware(['auth']);

Route::middleware('rolemanager:utilisateur,admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/modifcomm/{comment}', [ProfileController::class, 'editcomm']);
    Route::post('/modifcomm/{comment}', [ProfileController::class, 'updatecomm'])->name('edit.comm');


    
});

Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');

Route::prefix('blog')->name('blog.')->controller(Blogcontroller::class)->group( function () {
    
    Route::get('/','index')->name('index');
    
});
Route::get('/tous' , [UserControl::class,'recherche'])->name('tous');
Route::get('/{commentaire}', [UserControl::class,'showscomm'])->name('user.reactioncomm');


Route::prefix('user')->name('user.')->controller(UserControl::class)->group(function () {

    Route::get('/forum', function () {
        return view('accueil',['posts'=>Post::orderBy('id','desc')->paginate(5),"recents"=>Post::orderBy('id','desc')->limit(3)->get()]);
    })->name('accueil');


    Route::get('/newpost', 'newpost')->name('newpost')->middleware(['auth']);
    Route::post('/newpost', 'save');

    Route::get('/{post}/modifier','modifier')->name('modif');
    Route::post('/{post}/modifier','update');


    Route::get('/lire/{nom}','show')->where([
        'nom'=>'[a-zA-Z0-9\-]+'
    ])->name('show');



    Route::get('/{nom}-{user}','showprofil')->where([
        'user'=>'[0-9]+',
    'nom'=>'[a-zA-Z0-9\-]+'
    ])->name('profil');
    
    Route::post('/lire/{nom}-{post}', 'commente');


    Route::get('/{post}', 'shows')->name('reaction');


    Route::get('/subscribe/{user}', 'subscribe')->name('subscribe');
    Route::get('/unsubscribe/{user}', 'unsubscribe')->name('unsubscribe');
    Route::get('/editp/{id}', 'EditEtat')->name('EditEtatpost');

    Route::put('/posts/{post}', 'updates')->name('posts.update');

    
    Route::get('/comments/{user}', 'comments')->name('comments');


    Route::get('/edit/{post}','edit')->name('editpost');

    Route::post('/edit/{post}','update');

});
Route::get('/supp/{id}', [UserControl::class ,'commentedelete'])->name('deletecomm');
Route::get('/dashboard/{id}', [UserControl::class ,'postdelete'])->name('deletepost');



Route::put('/profile', [UserControl::class, 'profil'])->name('photo');





require __DIR__.'/adminauth.php';
Route::prefix('/admin')->controller(AdminControl::class)->name('admin.')->middleware(['rolemanager:admin', 'verified'])->group( function () {
    Route::get('/dashboard','dashboard')->name('dashboard');

    Route::get('/cat','newcat')->name('newcat');
    Route::post('/cat', 'save');
    Route::get('/cat/{id}','editcat')->name('editcat');
    Route::post('/cat/{id}','edit');
    Route::get('/cate/{id}','deletecat')->name('deletecat');

    Route::get('/tag','newtag')->name('newtag');
    Route::post('/tag', 'savetag');
    Route::get('/tag/{id}','edittag')->name('edittag');
    Route::post('/tag/{id}','editage');
    //Route::get('/tage/{id}','deletecat')->name('deletecat');
    
    Route::get('/gereastuce','gereastuce')->name('adminastuce');


    Route::get('/gereastuce/{id}/','gestion')->name('gerer');

    Route::get('/delete/{astuce}-{donnee}','editastuce')->name('gereredit');
    Route::get('/user-st/{user}','gestionuser')->name('gestionuser');
    Route::get('/lutilisateur/{user}',"edituser")->name('edituser');
    Route::delete('/supprimer/{user}','destroy')->name('user.destroy');

        Route::get('/users', function () {
            return view("admin.users");
        })->name('users');
    


});

// routes/web.php


Route::get('/user/contact', [UserControl::class])->name('contact1');
Route::post('/user/{post}/contact', [UserControl::class,'contact'])->name('user.contact');


Route::prefix('astuces')->name('astuces.')->middleware(['auth'])->controller(AstucesControllers::class)->group(function (){


    Route::get('/new','create')->name('new');

    Route::post('/new','store');

    Route::get('/user/{nom}-{astuce}','accueil')->where([
        'astuce'=>'[0-9]+',
    'nom'=>'[a-zA-Z0-9\-]+'
    ])->name('mesastuces');
    Route::get('/edit/{astuce}','edit')->name('editastuce');
    Route::post('/edit/{astuce}','update');
    Route::get('/news','creates')->name('newsans');

});

Route::get('/previsualiser/{astuce}',[AstucesControllers::class, 'previsualiser'])->where([
    'nom'=>'[a-zA-Z0-9\-]+'
])->name("astuces.previsualiser");

Route::get('astuces/{nom}',[AstucesControllers::class, 'show'])->where([
'nom'=>'[a-zA-Z0-9\-]+'
])->name('astuces.shoastuce');

Route::post('astuces/{nom}-{astuce}', [AstucesControllers::class, 'commenter']);


Route::post('/contact',[UserControl::class, "contacts"])->name("contacts");
Route::post('/signalement/{user}/{post}',[UserControl::class, "signalement"])->name("signalement");

// Routes pour l'enregistrement des posts
Route::middleware('auth')->group(function () {
    Route::get('/enregistrements', [EnregistrementController::class, 'index'])->name('enregistrements.index');
    Route::post('/posts/{post}/enregistrer', [EnregistrementController::class, 'store'])->name('enregistrements.store');
    Route::delete('/enregistrements/{post}', [EnregistrementController::class, 'destroy'])->name('enregistrements.destroy');
});


