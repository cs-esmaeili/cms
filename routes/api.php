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
        Route::post('/adminroles', [Person::class, 'adminRoles'])->name('adminRoles');
        Route::post('/createperson', [Person::class, 'createPerson'])->name('createPerson');
        Route::post('/editperson', [Person::class, 'editPerson'])->name('editPerson');
        Route::post('/roles', [Person::class, 'roles'])->name('roles');
        Route::post('/rolepermissions', [Person::class, 'rolePermissions'])->name('rolePermissions');
        Route::post('/addpermission', [Person::class, 'addPermission'])->name('addPermission');
        Route::post('/missingpermissions', [Person::class, 'missingPermissions'])->name('missingPermissions');
        Route::post('/addrole', [Person::class, 'addRole'])->name('addRole');
        Route::post('/deleterole', [Person::class, 'deleteRole'])->name('deleteRole');
        Route::post('/editrole', [Person::class, 'editRole'])->name('editRole');
        Route::post('/deletepermission', [Person::class, 'deletePermission'])->name('deletePermission');



        Route::post('/saveFile', [FileManager::class, 'saveFile'])->name('saveFile');
        Route::post('/saveFiles', [FileManager::class, 'saveFiles'])->name('saveFiles');







        Route::post('/createpost', [Post::class, 'createPost'])->name('createPost');
        Route::post('/postlist', [Post::class, 'postList'])->name('postList');
        Route::post('/changestatus', [Post::class, 'changeStatus'])->name('changeStatus');
        Route::post('/deletepost', [Post::class, 'deletePost'])->name('deletePost');
        Route::post('/editpost', [Post::class, 'editPost'])->name('editPost');
        Route::post('/createmaincategory', [Category::class, 'createMainCategory'])->name('createMainCategory');
        Route::post('/maincategorylist', [Category::class, 'mainCategoryList'])->name('mainCategoryList');
        Route::post('/editmaincategory', [Category::class, 'editMainCategory'])->name('editMainCategory');
        Route::post('/deletemainctegory', [Category::class, 'deleteMainCtegory'])->name('deleteMainCtegory');
        Route::post('/createbubcategory', [Category::class, 'createSubCategory'])->name('createSubCategory');
        Route::post('/subcategorylist', [Category::class, 'subCategoryList'])->name('subCategoryList');
        Route::post('/editsubcategory', [Category::class, 'editsubcategory'])->name('editsubcategory');
        Route::post('/deletesubctegory', [Category::class, 'deleteSubCtegory'])->name('deleteSubCtegory');
        Route::post('/createproduct', [Product::class, 'createProduct'])->name('createProduct');
        Route::post('/productlist', [Product::class, 'productList'])->name('productList');
        Route::post('/productlist', [Product::class, 'productList'])->name('productList');
        Route::post('/deleteproduct', [Product::class, 'deleteProduct'])->name('deleteProduct');
        Route::post('/editproducinfo', [Product::class, 'editProducInfo'])->name('editProducInfo');
        Route::post('/productimagelist', [Product::class, 'productImageList'])->name('productImageList');
        Route::post('/deleteproductimage', [Product::class, 'deleteProductImage'])->name('deleteProductImage');
        Route::post('/addproductimage', [Product::class, 'addProductImage'])->name('addProductImage');
        Route::post('/postcategorylist', [Category::class, 'postCategoryList'])->name('postCategoryList');
        Route::post('/createpostcategory', [Category::class, 'createPostCategory'])->name('createPostCategory');
        Route::post('/editpostcategory', [Category::class, 'editPostCategory'])->name('editPostCategory');
        Route::post('/changedata', [Home::class, 'changeData'])->name('changeData');
    });
});
