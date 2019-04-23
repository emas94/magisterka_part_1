<?php

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

Route::get('/','AllController@getNews', function () {
    return view('strona_glowna/strona_glowna');
});
Route::get('wyniki', function () {
    return view('wyniki');
});
Route::get('add/{id}','AllController@addPoints');
Route::get('sub/{id}','AllController@substractPoints');
Route::get('druzyny/', 'DruzynyController@druzynyIndex');
Route::get('mecze/', 'MeczeController@meczeIndex');
Route::get('mecze/{id}', 'MeczeController@Show');
Route::get('mecze/organizer/{id}','MeczeController@listByOrganizer');
Route::get('wyjazdy/', 'MeczeController@wyjazdyIndex');
Route::get('wyjazdy/{id}', 'MeczeController@Show');
Route::get('wyjazdy/wyjazd/{id}','MeczeController@listByClient');
Route::get('ligi/', 'LigiController@ligiIndex');
Route::get('stadiony/', 'StadionyController@stadionyIndex');
Route::get('organizatorzy/edit/{id}', 'OrganizatorzyController@Edit')->middleware('admin');
Route::get('organizatorzy/create', 'OrganizatorzyController@Create')->middleware('admin');
Route::get('organizatorzy/', 'OrganizatorzyController@Organizatorzy');
Route::get('organizatorzy/{id}', 'OrganizatorzyController@listByNews');
Route::get('organizatorzy/{id}','OrganizatorzyController@Show');
Route::get('organizatorzy/organizer/{id}','OrganizatorzyController@listByOrganizer');
Route::get('organizatorzy/delete/{id}','AdminiController@Delete')->middleware('admin');
Route::get('wyjazdylist/{id}','OrganizatorzyController@Show');

Route::get('news/{id}','AllController@newsShow');

Route::get('admini/', 'AdminiController@Admini');
Route::get('admini/{id}','AdminiController@Show');
Route::get('wszyscy/edit/{id}', 'WszyscyController@Edit')->middleware('admin');
Route::get('wszyscy/', 'WszyscyController@Wszyscy');
Route::get('wszyscy/{id}','OrganizatorzyController@Show');
Route::get('/emas', function () {
    return ('kontakt.php');
});
Route::get('/kontakt', function () {
    return view('kontakt/kontakt');
});
Route::get('/o_nas', function () {
    return view('o_nas/o_nas');
});
Route::get('/zaloguj', function () {
    return view('logowanie/logowanie');
});
route::prefix('admin')->group(function(){
     Route::get('/test1/{name}', function ($name) {
        return $name;
    });
    Route::get('/paneladministratora', function () {
        return view('admin/paneladministratora');
    })->middleware('admin');
    Route::get('paneladministratora/createMecz', 'AdminiController@CreateMecz')->middleware('organizator');
    Route::post('paneladministratora/createMecz', 'AdminiController@Store')->middleware('organizator');

    Route::get('paneladministratora/createLiga', 'AdminiController@CreateLiga')->middleware('admin');
    Route::post('paneladministratora/createLiga', 'AdminiController@StoreLiga')->middleware('admin');

    Route::get('paneladministratora/createDruzyna', 'AdminiController@CreateDruzyna')->middleware('admin');
    Route::post('paneladministratora/createDruzyna', 'AdminiController@StoreDruzyna')->middleware('admin');

    Route::get('paneladministratora/createOrganizator', 'AdminiController@CreateOrganizer')->middleware('admin');
    Route::post('paneladministratora/createOrganizator', 'AdminiController@StoreOrganizer')->middleware('admin');

    Route::get('paneladministratora/editUser/', 'AdminiController@EditIndex')->middleware('admin');
    Route::get('paneladministratora/editUser/{id}', 'AdminiController@Edit')->middleware('admin');
    Route::post('paneladministratora/editUser', 'AdminiController@editStore')->middleware('admin');



});
Route::get('/zapisy', function () {
    return view('zapisy/zapisy');
});
Route::get('/zapisy', 'WszyscyController@showMecz');
Route::post('/zapisy', 'WszyscyController@registerMatch');
route::prefix('organizator')->group(function(){
    Route::get('/panelorganizatora', function () {
        return view('organizator/panelorganizatora');
    })->middleware('organizator');
    Route::get('panelorganizatora/createNews', 'AllController@CreateNews')->middleware('organizator');
    Route::post('panelorganizatora/createNews', 'AllController@StoreNews')->middleware('organizator');
    Route::get('panelorganizatora/delete/{id}','AllController@Delete')->middleware('organizator');
});
Route::post('/kontakt', function () {
    return view('kontakt/kontakt');
})->name('kontakt');

Route::get('/kontakt', function () {
    return view('kontakt/kontakt');
})->name('kontakt');
Route::post('/sendmail', function () {
    return view('kontakt/sendmail');
})->middleware('uzytkownik');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

