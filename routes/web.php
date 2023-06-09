<?php

use App\Http\Controllers\Character;
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

Route::get('/', [Character::class, 'getAllCharacters']);
Route::get('/character/{id}', [Character::class, 'getCharacter']);
Route::post('/search', [Character::class, 'searchCharacters']);
