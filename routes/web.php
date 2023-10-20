<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\NoleggioController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UtenteController;
use Illuminate\Support\Facades\Route;

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


/*------------------------------------------
---                                      ---
---        All Public Routes List        ---
---                                      ---
--------------------------------------------*/

Route::view('/', "public/home")
    ->name('home');

Route::get('/relazione', function () {
    return response()->file(public_path('relazione.pdf'),['content-type'=>'application/pdf']);
})
    ->name("relazione");

Route::get("/catalogo", [AutoController::class, "search"])
    ->name('catalogo');

Route::post("/catalogo/prenota", [NoleggioController::class, "store"])
    ->name('noleggio.store')->middleware("can:doesntHaveNoleggio");

Route::get("/catalogo/auto-{id}", [AutoController::class, "show"])
    ->name('auto.show');

Route::get('faq', [FAQController::class, "show"])
    ->name('faq');

Route::view('login', "public/login")
    ->name('login')->middleware("guest");

Route::post('login', [UtenteController::class, "authenticate"])
    ->middleware("guest");;

Route::view('register', "public/register")
    ->name('register')->middleware("guest");

Route::post('register', [ClienteController::class, "store"])
    ->middleware("guest");;

Route::get('/logout', [UtenteController::class, 'logout'])
    ->name('logout')->middleware("auth");



/*------------------------------------------
---                                      ---
---        All Users Routes List         ---
---                                      ---
--------------------------------------------*/

Route::middleware("can:isClient")->prefix('client')->group(function () {

    Route::prefix('edit')->group(function () {

        Route::put("/updateProfile", [ClienteController::class, 'updateProfile'])
            ->name('cliente.update.profile');
        Route::put("/updatePassword", [ClienteController::class, 'updatePassword'])
            ->name('cliente.update.password');
        Route::put("/updateImage", [ClienteController::class, 'updateImage'])
            ->name('cliente.update.image');
        Route::get("/profile", [ClienteController::class, 'editProfile'])
            ->name('cliente.edit.profile');
        Route::get("/password", [ClienteController::class, 'editPassword'])
            ->name('cliente.edit.password');
    });

    Route::get("/noleggio", [NoleggioController::class, 'show'])
            ->name('cliente.noleggio');

});



/*------------------------------------------
---                                      ---
---    All Staff & Admin Routes List     ---
---                                      ---
--------------------------------------------*/

Route::middleware("can:isStaffOrAdmin")->prefix("management")->group(function () {

    Route::resource('auto', AutoController::class)->except("show");

    Route::get('/noleggio/all', [NoleggioController::class, "showNoleggiFromYear"])
        ->name("noleggio.year");

    Route::post('/noleggio', [NoleggioController::class, "showNoleggiFromMonth"])
        ->name("noleggio.month");

});



/*------------------------------------------
---                                      ---
---        All Admin Routes List         ---
---                                      ---
--------------------------------------------*/

Route::middleware("can:isAdmin")->prefix("management")->group(function () {

    Route::resource('staff', StaffController::class)->except("show");

    Route::prefix('cliente')->group(function () {
        Route::get('/all', [ClienteController::class, 'index'])
            ->name('cliente.index');
        Route::post('/delete', [ClienteController::class, "deleteSelected"])
            ->name('cliente.delete');
        Route::post('/delete/all', [ClienteController::class, "deleteAll"])
            ->name('cliente.deleteAll');
    });

    Route::resource('faq', FAQController::class)->except("show");

    Route::get('/statistiche', [NoleggioController::class, "getStatistiche"])
        ->name("statistiche");

});


