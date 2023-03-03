<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReplicatedStorage;

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
Route::get('/',function(){
    return 
    '<html>
        <h1>List of Page</h1><br>
        <a href="/category">Product</a><br>
        <a href="/news">News</a><br>
        <a href="/program">Program</a><br>
        <a href="/about-us">About</a><br>
        <a href="/contact-us">Contact us</a><br>
    </html>';
});
 route::get('/category',function(){
    return 
    '<html>
        <h1>Category</h1><br>
        <a href="/category/marbel-edu-games">Goto Marbel edu games</a><br>
        <a href="/category/marbel-and-friends-kids-games">Goto Marbel and friends kids games</a><br>
        <a href="/category/riri-story-books">Goto riri story books</a><br>
        <a href="/category/kolak-kids-songs">kolak kids songs</a><br>
    </html>';
 });

Route::prefix('category')->group(function () {
    Route::get('/marbel-edu-games', function () {
        return redirect ('https://www.educastudio.com/category/marbel-edu-games');
    });
    Route::get('/marbel-and-friends-kids-games', function () {
        return redirect ('https://www.educastudio.com/category/marbel-and-friends-kids-games');
    });
    Route::get('/riri-story-books', function () {
        return redirect ('https://www.educastudio.com/category/riri-story-books');
    });
    Route::get('/kolak-kids-songs', function () {
        return redirect ('https://www.educastudio.com/category/kolak-kids-songs');
    });
});
route::prefix('news')->group(function(){
    route::get('/',function(){
        return 
        '<html>
            <h1>News</h1><br>
            <a href="/news/news1">News 1</a><br>
        </html>';
    });
    route::get('/{parameter}',function(string $parameter){
        if ($parameter==" "){
            return '<a href="/news/news1">News 1</a>';
        }
        else if($parameter=="news1"){
            return 'redirecting to '.$parameter."<br>".
            redirect('https://www.educastudio.com/news/educa-studio-berbagi-untuk-warga-sekitar-terdampak-covid-19');
        }
        return $parameter;
    });
});

Route::prefix('program')->group(function () {
    route::get('/',function(){
        return 
        '<html>
            <h1>Program</h1><br>
            <a href="/program/karir">karir</a><br>
            <a href="/program/magang">magang</a><br>
            <a href="/program/kunjungan-industri">Kunjungan Industri</a><br>
        </html>';
    });
    Route::get('/karir', function () {
        return redirect('https://www.educastudio.com/program/karir');
    });
    Route::get('/magang', function () {
        return redirect('https://www.educastudio.com/program/magang');
    });
    Route::get('/kunjungan-industri', function () {
        return redirect('https://www.educastudio.com/program/kunjungan-industri');
    });
});
Route::get('/about-us', function () {
    return redirect('https://www.educastudio.com/about-us');
});
Route::resource('contact-us', ReplicatedStorage::class);