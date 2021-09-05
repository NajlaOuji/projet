<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LockScreen;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\ChartController;


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
    return view('login');
});

/*Route::get('/accueil', function () {
    return view('accueil');
})->middleware(['auth'])->name('accueil');


Route::get('/utilisateur', function () {
    return view('utilisateurs/utilisateur');
});

Route::get('/projet', function () {
    return view('projets/projet');
});
Route::get('/add-projet', function () {
    return view('projets/add-projet');
});
Route::get('/email-compose', function () {
    return view('email/email-compose');
});
Route::get('/email-inbox', function () {
    return view('email/email-inbox');
});
Route::get('/email-read', function () {
    return view('email/email-read');
});
Route::get('/module', function () {
    return view('modules/module');
});
Route::get('/add-module', function () {
    return view('modules/add-module');
});
Route::get('/tache', function () {
    return view('taches/tache');
});
Route::get('/add-tache', function () {
    return view('taches/add-tache');
});

Route::get('/recover', function () {
    return view('recover');
});*/
Route::get('/conversation', function () {
    return view('livewire.convarsation');
});
Route::get('/lock-screen', function () {
    return view('lock-screen');
});

// ----------------------------- lock screen --------------------------------//
Route::get('lock_screen', [App\Http\Controllers\LockScreen::class, 'lockScreen'])->middleware('auth')->name('lock_screen');
Route::get('accueil', [App\Http\Controllers\ChartController::class, 'barChart'])->middleware('auth')->name('accueil');
Route::post('unlock', [App\Http\Controllers\LockScreen::class, 'unlock'])->name('unlock');
// ----------------------------------------------------------------------------//
Route::get('/utilisateur',[UserController::class,'getUser']);
Route::get('/add-user',[UserController::class,'addUser']);
Route::post('/add-user',[UserController::class,'createUser'])->name('user.create');

/*Route::post('/add',[UserController::class,'add'])->name('add');*/
Route::post('/update',[UserController::class,'update'])->name('update');
Route::get('delete_user/{id}', [UserController::class, 'delete']);
Route::post('/profile',[UserController::class,'updateProfile'])->name('updateProfile');

Route::get('/projet',[ProjetController::class,'getProjet']);
Route::get('/add-projet',[ProjetController::class,'addProjet']);
Route::post('/add-projet',[ProjetController::class,'createProjet'])->name('projet.create');
Route::post('/updateProjet',[ProjetController::class,'updateProjet'])->name('updateProjet');
Route::post('/updateEtat',[ProjetController::class,'updateEtat'])->name('updateEtat');
Route::get('delete_projet/{id}{id_chef}', [ProjetController::class, 'delete']);
Route::get('/projetchef',[ProjetController::class,'getProjetid']);
Route::get('fermer_projet/{id}', [ProjetController::class, 'fermer']);
Route::get('/download/{document}',[ProjetController::class,'download']);

Route::get('add-module/{id}',[ModuleController::class,'ajouterM']);
Route::post('/add-module',[ModuleController::class,'createModule'])->name('module.create');
/*Route::post('/createModule',[ModuleController::class,'createModule'])->name('createModule');*/
Route::get('/module/{id}',[ModuleController::class,'getModule']);
Route::get('delete_module/{id}', [ModuleController::class, 'delete']);
Route::post('/updateModule',[ModuleController::class,'updateModule'])->name('updateModule');

Route::get('add-tache/{id}',[TacheController::class,'ajouterT']);
Route::post('/add-tache',[TacheController::class,'createTache'])->name('tache.create');
Route::get('/tache/{id}',[TacheController::class,'getTache']);
Route::post('/updateTache',[TacheController::class,'updateTache'])->name('updateTache');
Route::get('delete_tache/{id}', [TacheController::class, 'delete']);
Route::get('/tachemembre',[TacheController::class,'getTacheid']);
Route::get('start_tache/{id}', [TacheController::class, 'start']);
Route::get('finish_tache/{id}', [TacheController::class, 'finish']);
Route::get('show-tache/{id}',[TacheController::class,'showTache']);
Route::post('/updateTaux',[TacheController::class,'updateTaux'])->name('updateTaux');
Route::post('/updateT',[TacheController::class,'updateT'])->name('updateT');

Route::get('/calendrier',[CalendarController::class,'index']);
Route::get('full-calender', [CalendarController::class, 'get']);



//auth route for administrator 
Route::group(['middleware' => ['auth', 'role:administrator']], function() { 
   
    
});


// for chef de projet
Route::group(['middleware' => ['auth', 'role:chefprojet']], function() { 
    /*Route::get('/projet',[ProjetController::class,'getProjetid']);*/
});


// for membre de projet
Route::group(['middleware' => ['auth', 'role:membreprojet']], function() { 
    Route::get('/confirmUser/{id}', [UserController::class, 'confirm'])->name('confirm.user');
    Route::get('/conversation',[ConversationController::class,'index']);
    Route::get('/conversation/{conversation}', [ConversationController::class, 'show'])->name('conversation.show');
    Route::get('delete_conversation/{id}', [ConversationController::class, 'delete']);
    Route::get('/chat',[ConversationController::class,'get']);
});



// for client
Route::group(['middleware' => ['auth', 'role:client']], function() { 
   
});






require __DIR__.'/auth.php';
