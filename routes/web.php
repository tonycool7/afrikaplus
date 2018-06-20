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

Route::get('/', function () {
    $songs = \App\Afrika\Music::inRandomOrder()->get();
    return view('welcome', compact('songs'));
});

Route::get('redis', function(){
    $redis = LRedis::connection();
    $redis->set('name', 'Anthony');
    dd($redis->get('name'));
});

Route::view('/error', 'error.error');

Route::get('/shop/checkout', 'Shop\\CheckoutController@index');

Route::get('/shop/place_order', 'Shop\\CheckoutController@placeOrder')->middleware('auth:shopUser');

Route::get('/shop/resend_email_verification', 'Auth\ShopRegisterController@resendVerification');

Route::get('/resend_email_verification', 'Auth\RegisterController@resendVerification');

Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');

Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');

Route::view('/shop/nonactivated', 'shopnonactivated');

Route::view('/nonactivated', 'nonactivated');

Route::get('/shop/add_to_cart/{id}', 'Shop\\CartController@add');

Route::get('/shop/delete_from_cart/{id}', 'Shop\\CartController@deleteItem');

Route::get('/shop/cart', 'Shop\\CartController@cart');

Route::get('/shop/fetch_cart', 'Shop\\CartController@fetchCart');

Route::get('/shop/account', 'Shop\\UserController@index')->name('shop.account');

Route::get('/shop/login', 'Auth\ShopLoginController@showLoginForm')->name('shop.login');

Route::post('/shop/login', 'Auth\ShopLoginController@login')->name('shop.submit.login');

Route::get('/shop/register', function (){
    return view('auth.shopregister');
})->name('shop.register');

Route::post('/shop/register', 'Auth\ShopRegisterController@register')->name('shop.submit.register');

Route::post('shop/logout', 'Auth\ShopLoginController@logout');

Route::resource('/shop/admin', 'Shop\\AdminController');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/shop/product', 'Shop\\ProductController');

Route::get('/shop/{cat}', 'Shop\\ProductController@category');

Route::get('/shop', 'Shop\\HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/afrika/admin/', 'AdminController@admin');

Route::post('/afrika/admin/album', 'AdminController@addAlbum');

Route::get('/afrika/admin/album', function (){
    return redirect('/afrika/admin');
});

//Route::post('/afrika/admin/music', 'AdminController@addMusic');

Route::post('/user/edit', 'Shop\\UserController@editUser');

Route::get('/afrika/admin/music', function (){
    return redirect('/afrika/admin');
});

Route::resource('/profile', 'Afrikaplus\\ProfileController');

Route::resource('/posts', 'Afrikaplus\\PostsController');

Route::resource('/likes', 'Afrikaplus\\LikesController');

Route::resource('/playlist', 'Afrikaplus\\PlaylistController');

Route::get('/fetch_user/{username}', 'Afrikaplus\\ProfileController@showJson');

Route::post('/music_search', 'Afrikaplus\\MusicController@searchMusic');

Route::post('/avatar', 'Afrikaplus\\ProfileController@uploadAvatar');

Route::post('/find_user', 'Afrikaplus\\ProfileController@findUser');


Route::delete('/user', 'HomeController@deleteUser');

Route::resource('/album', 'Afrikaplus\\AlbumController');
Route::resource('/videos', 'Afrikaplus\\VideoController');
Route::resource('/events', 'Afrikaplus\\EventsController');
Route::resource('/movies', 'Afrikaplus\\MoviesController');
Route::resource('/music', 'Afrikaplus\\MusicController');
Route::resource('/djmix', 'Afrikaplus\\DjmixController');
Route::resource('/news', 'Afrikaplus\\NewsController');
Route::resource('/comments', 'Afrikaplus\\CommentsController');
Route::resource('/user_events', 'Afrikaplus\\UserEventsController');




