<?php

use App\Http\Controllers\LogementsControlleur;
use App\Http\Controllers\SejoursControlleur;
use App\Http\Controllers\VoyageursControlleur;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// Logements routes

Route::prefix('/logement')->name('logement.')->controller(LogementsControlleur::class)->group(function () {
    Route::get('/', 'index')->name('index');
    // Route::get('/{logementCode}', 'voirLogement')->name('voir');
    Route::get('/nouveau', 'nouveauLogement')->name('nouveau');
    Route::post('/ajouter', 'ajouterLogement')->name('ajouter');
    Route::delete('/{logementCode}/supprimer', 'supprimerLogement')->name('supprimer');
    Route::get('/{logementCode}/mofidier', 'modificationLogement')->name('modification');
    Route::patch('/{logementCode}/mofidier', 'modifierLogement')->name('modifier');
});

// Sejours routes

Route::prefix('/sejour')->name('sejour.')->controller(SejoursControlleur::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/afficher/{sejourID}', 'afficherSejour')->name('afficher');
    Route::get('/nouveau', 'nouveauSejour')->name('nouveau');
    Route::post('/ajouter', 'ajouterSejour')->name('ajouter');
    Route::delete('/{sejourID}/supprimer', 'supprimerSejour')->name('supprimer');
    Route::get('/{sejourID}/mofidier', 'modificationSejour')->name('modification');
    Route::patch('/{sejourID}/mofidier', 'modifierSejour')->name('modifier');
});

// Voyageurs routes
Route::prefix('/voyageur')->name('voyageur')->controller(VoyageursControlleur::class)->group(function () {
    Route::get('/rechercher-info-sejour', 'index')->name('.index');
    Route::get('/rechercher', 'rechercherInfoSejour')->name('.rechercherInfoSejour');
});
