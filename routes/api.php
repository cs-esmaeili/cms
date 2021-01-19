<?php

use App\Http\classes\FM;
use App\Http\classes\G;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Category;
use App\Http\Controllers\FileManager;
use App\Http\Controllers\Person;
use App\Http\Controllers\Product;
use App\Http\Middleware\CheckHeaders;
use App\Http\Middleware\CheckToken;
use App\Models\File;
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


        Route::post('/savePublicFile', [FileManager::class, 'savePublicFile'])->name('savePublicFile');
        Route::post('/savePrivateFile', [FileManager::class, 'savePrivateFile'])->name('savePrivateFile');

        Route::post('/savePublicFiles', [FileManager::class, 'savePublicFiles'])->name('savePublicFiles');
        Route::post('/savePrivateFiles', [FileManager::class, 'savePrivateFiles'])->name('savePrivateFiles');

        Route::post('/deletePublicFile', [FileManager::class, 'deletePublicFile'])->name('deletePublicFile');
        Route::post('/deletePrivateFile', [FileManager::class, 'deletePrivateFile'])->name('deletePrivateFile');

        Route::post('/deletePublicFiles', [FileManager::class, 'deletePublicFiles'])->name('deletePublicFiles');
        Route::post('/deletePrivateFiles', [FileManager::class, 'deletePrivateFiles'])->name('deletePrivateFiles');

        Route::post('/deletePublicFolder', [FileManager::class, 'deletePublicFolder'])->name('deletePublicFolder');
        Route::post('/deletePrivateFolder', [FileManager::class, 'deletePrivateFolder'])->name('deletePrivateFolder');

        Route::post('/assignFileToUser', [FileManager::class, 'assignFileToUser'])->name('assignFileToUser');
        Route::post('/unAssignFileFromUser', [FileManager::class, 'unAssignFileFromUser'])->name('unAssignFileFromUser');

        Route::post('/renamePublicFolder', [FileManager::class, 'renamePublicFolder'])->name('renamePublicFolder');
        Route::post('/renamePrivateFolder', [FileManager::class, 'renamePrivateFolder'])->name('renamePrivateFolder');

        Route::post('/publicFolderFiles', [FileManager::class, 'publicFolderFiles'])->name('publicFolderFiles');
        Route::post('/privateFolderFiles', [FileManager::class, 'privateFolderFiles'])->name('privateFolderFiles');

        Route::post('/publicFolderFilesLinks', [FileManager::class, 'publicFolderFilesLinks'])->name('publicFolderFilesLinks');
        Route::post('/privateFolderFilesLinks', [FileManager::class, 'privateFolderFilesLinks'])->name('privateFolderFilesLinks');

        Route::post('/deletePublicFolderOrFile', [FileManager::class, 'deletePublicFolderOrFile'])->name('deletePublicFolderOrFile');
        Route::post('/deletePrivateFolderOrFile', [FileManager::class, 'deletePrivateFolderOrFile'])->name('deletePrivateFolderOrFile');

        Route::post('/createPublicFolder', [FileManager::class, 'createPublicFolder'])->name('createPublicFolder');
        Route::post('/createPrivateFolder', [FileManager::class, 'createPrivateFolder'])->name('createPrivateFolder');

        Route::post('/publicFileInformation', [FileManager::class, 'publicFileInformation'])->name('publicFileInformation');
        Route::post('/privateFileInformation', [FileManager::class, 'privateFileInformation'])->name('privateFileInformation');


        Route::any('/file/{hash}', function ($hash, Request $request) {
            $person = G::getPersonFromToken($request->bearerToken());
            $file = $person->files()->where('hash', '=', $hash)->get();
            if ($file->count() == 1) {
                return response()->file($file[0]->location . $file[0]->new_name);
            }else{
                return response(['statusText' => 'fail', 'message' => "درخواست شما مجاز نیست"], 200);
            }
        })->name('privateFile');

        Route::post('/categoryList', [Category::class, 'categoryList'])->name('categoryList');
        Route::post('/addCategory', [Category::class, 'addCategory'])->name('addCategory');


        // Route::post('/createPost', [Post::class, 'createPost'])->name('createPost');
        // Route::post('/postList', [Post::class, 'postList'])->name('postList');
        // Route::post('/changeStatus', [Post::class, 'changeStatus'])->name('changeStatus');
        // Route::post('/deletePost', [Post::class, 'deletePost'])->name('deletePost');
        // Route::post('/editPost', [Post::class, 'editPost'])->name('editPost');
        // Route::post('/createMainCategory', [Category::class, 'createMainCategory'])->name('createMainCategory');
        // Route::post('/mainCategoryList', [Category::class, 'mainCategoryList'])->name('mainCategoryList');
        // Route::post('/editMainCategory', [Category::class, 'editMainCategory'])->name('editMainCategory');
        // Route::post('/deleteMainCtegory', [Category::class, 'deleteMainCtegory'])->name('deleteMainCtegory');
        // Route::post('/createSubCategory', [Category::class, 'createSubCategory'])->name('createSubCategory');
        // Route::post('/subCategoryList', [Category::class, 'subCategoryList'])->name('subCategoryList');
        // Route::post('/editsubcategory', [Category::class, 'editsubcategory'])->name('editsubcategory');
        // Route::post('/deleteSubCtegory', [Category::class, 'deleteSubCtegory'])->name('deleteSubCtegory');
        // Route::post('/createProduct', [Product::class, 'createProduct'])->name('createProduct');
        // Route::post('/productList', [Product::class, 'productList'])->name('productList');
        // Route::post('/deleteProduct', [Product::class, 'deleteProduct'])->name('deleteProduct');
        // Route::post('/editProducInfo', [Product::class, 'editProducInfo'])->name('editProducInfo');
        // Route::post('/productImageList', [Product::class, 'productImageList'])->name('productImageList');
        // Route::post('/deleteProductImage', [Product::class, 'deleteProductImage'])->name('deleteProductImage');
        // Route::post('/addProductImage', [Product::class, 'addProductImage'])->name('addProductImage');
        // Route::post('/postCategoryList', [Category::class, 'postCategoryList'])->name('postCategoryList');
        // Route::post('/createPostCategory', [Category::class, 'createPostCategory'])->name('createPostCategory');
        // Route::post('/editPostCategory', [Category::class, 'editPostCategory'])->name('editPostCategory');
        // Route::post('/changeData', [Home::class, 'changeData'])->name('changeData');
    });
});
