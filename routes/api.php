<?php

use App\Http\Controllers\Authentication;
use App\Http\Controllers\Category;
use App\Http\Controllers\FileManager;
use App\Http\Controllers\Person;
use App\Http\Controllers\Product;
use App\Http\Middleware\CheckHeaders;
use App\Http\Middleware\CheckToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('admin')->middleware([CheckHeaders::class])->group(function () {

    Route::post('/login', [Authentication::class, 'Login'])->name('Login');
    Route::post('/logout', [Authentication::class, 'Logout'])->name('Logout');

    Route::middleware([CheckToken::class])->group(function () {
        Route::post('/admins', [Person::class, 'admins'])->name('admins');
        Route::post('/adminRoles', [Person::class, 'adminRoles'])->name('adminRoles');
        Route::post('/createPerson', [Person::class, 'createPerson'])->name('createPerson');
        Route::post('/editPerson', [Person::class, 'editPerson'])->name('editPerson');
        Route::post('/roles', [Person::class, 'roles'])->name('roles');
        Route::post('/rolePermissions', [Person::class, 'rolePermissions'])->name('rolePermissions');
        Route::post('/addPermission', [Person::class, 'addPermission'])->name('addPermission');
        Route::post('/missingPermissions', [Person::class, 'missingPermissions'])->name('missingPermissions');
        Route::post('/addRole', [Person::class, 'addRole'])->name('addRole');
        Route::post('/deleteRole', [Person::class, 'deleteRole'])->name('deleteRole');
        Route::post('/editRole', [Person::class, 'editRole'])->name('editRole');
        Route::post('/deletePermission', [Person::class, 'deletePermission'])->name('deletePermission');

        Route::post('/saveFile', [FileManager::class, 'saveFile'])->name('saveFile');
        Route::post('/saveFiles', [FileManager::class, 'saveFiles'])->name('saveFiles');
        Route::post('/deleteFile', [FileManager::class, 'deleteFile'])->name('deleteFile');
        Route::post('/deleteFiles', [FileManager::class, 'deleteFiles'])->name('deleteFiles');
        Route::post('/deleteFolder', [FileManager::class, 'deleteFolder'])->name('deleteFolder');
        Route::post('/assignFileToUser', [FileManager::class, 'assignFileToUser'])->name('assignFileToUser');
        Route::post('/unAssignFileFromUser', [FileManager::class, 'unAssignFileFromUser'])->name('unAssignFileFromUser');
        Route::post('/renameFolder', [FileManager::class, 'renameFolder'])->name('renameFolder');


        Route::post('/createPost', [Post::class, 'createPost'])->name('createPost');
        Route::post('/postList', [Post::class, 'postList'])->name('postList');
        Route::post('/changeStatus', [Post::class, 'changeStatus'])->name('changeStatus');
        Route::post('/deletePost', [Post::class, 'deletePost'])->name('deletePost');
        Route::post('/editPost', [Post::class, 'editPost'])->name('editPost');
        Route::post('/createMainCategory', [Category::class, 'createMainCategory'])->name('createMainCategory');
        Route::post('/mainCategoryList', [Category::class, 'mainCategoryList'])->name('mainCategoryList');
        Route::post('/editMainCategory', [Category::class, 'editMainCategory'])->name('editMainCategory');
        Route::post('/deleteMainCtegory', [Category::class, 'deleteMainCtegory'])->name('deleteMainCtegory');
        Route::post('/createSubCategory', [Category::class, 'createSubCategory'])->name('createSubCategory');
        Route::post('/subCategoryList', [Category::class, 'subCategoryList'])->name('subCategoryList');
        Route::post('/editsubcategory', [Category::class, 'editsubcategory'])->name('editsubcategory');
        Route::post('/deleteSubCtegory', [Category::class, 'deleteSubCtegory'])->name('deleteSubCtegory');
        Route::post('/createProduct', [Product::class, 'createProduct'])->name('createProduct');
        Route::post('/productList', [Product::class, 'productList'])->name('productList');
        Route::post('/deleteProduct', [Product::class, 'deleteProduct'])->name('deleteProduct');
        Route::post('/editProducInfo', [Product::class, 'editProducInfo'])->name('editProducInfo');
        Route::post('/productImageList', [Product::class, 'productImageList'])->name('productImageList');
        Route::post('/deleteProductImage', [Product::class, 'deleteProductImage'])->name('deleteProductImage');
        Route::post('/addProductImage', [Product::class, 'addProductImage'])->name('addProductImage');
        Route::post('/postCategoryList', [Category::class, 'postCategoryList'])->name('postCategoryList');
        Route::post('/createPostCategory', [Category::class, 'createPostCategory'])->name('createPostCategory');
        Route::post('/editPostCategory', [Category::class, 'editPostCategory'])->name('editPostCategory');
        Route::post('/changeData', [Home::class, 'changeData'])->name('changeData');
    });
});
