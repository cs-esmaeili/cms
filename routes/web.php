<?php

use App\Http\Controllers\CategoryPage;
use App\Http\Controllers\IndexPage;
use App\Http\Controllers\PostPage;
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

Route::view('/', 'contents.coming-soon')->name('contact_us');
// Route::get('/', [IndexPage::class, 'indexPageView'])->name('indexPageView');
Route::get('/post/{post_id}', [PostPage::class, 'postPageView'])->name('postPageView');
Route::get('/category/{category_id}/{page_number}', [CategoryPage::class, 'categoryPageView'])->name('categoryPageView');
Route::view('/about_us', 'contents.about_us')->name('about_us');
Route::view('/contact_us', 'contents.contact_us')->name('contact_us');

// Route::any('/post/{post_id}', function (Request $request) {
// })->name('postPage');
