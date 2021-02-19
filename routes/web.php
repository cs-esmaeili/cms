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

Route::get('/', [IndexPage::class, 'indexPageView'])->name('indexPageView');
Route::get('/post/{post_id}', [PostPage::class, 'postPageView'])->name('postPageView');
Route::get('/category/{category_id}/{page_number}', [CategoryPage::class, 'categoryPageView'])->name('categoryPageView');

// Route::any('/post/{post_id}', function (Request $request) {
// })->name('postPage');
