<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    return view('welcome');
});


Route::get('/portfolio/{slug}', function($slug){
    $user = User::with('about')->with('education')->with('features')->with('hago')->with('proskill')->with('proyects')->with('reviews')->with('skill')->with('work')->where('slug', $slug)->first();
    if($user){
        return view('portfolio')->with('user', $user);
    }

    return view('welcome');
    
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
