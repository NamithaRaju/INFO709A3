<?php

use App\Http\Controllers\PagesController;
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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/products', function () {
//     return view('products');
// });

//for all the pages
Route::get('/', 'PagesController@index');
Route::post('search', 'PagesController@search');
Route::get('searchget/{name}', 'PagesController@searchget');


Route::get('veg', 'PagesController@veg');
Route::get('nonveg', 'PagesController@nonveg');
Route::get('drinks', 'PagesController@drinks');
Route::get('desserts', 'PagesController@desserts');
Route::get('showcart/{userid}', 'PagesController@showCart');
Route::get('showorder/{userid}', 'PagesController@showOrder');
Route::get('contact', 'PagesController@contact');
Route::post('insertcontact', 'PagesController@insertcontact');

//login n registration
Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin');
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration');
Route::get('dashboard', 'AuthController@dashboard');
Route::get('logout', 'AuthController@logout');

//cart
Route::get('addcart/{id}', 'PagesController@addCart');
Route::get('addcartsearch/{id}/{name}', 'PagesController@addCartSearch');
Route::get('addorder/{userid}/{optionid}', 'PagesController@addorder');
Route::get('deletecart/{id}/{userid}', 'PagesController@deletecart');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
