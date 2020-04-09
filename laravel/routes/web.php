<?php

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

Route::get('/', 'HomeController@indexAction');
/**
 * Admin 
 */
Route::prefix('admin')->group(function () {
        Route::middleware(['auth'])->group(function() {
            Route::get('dashboard', 'Dashboard\DashboardController@indexAction')->name('dashboard');
            /**
             * Post Router
             */
            Route::get('list-post', 'Post\ListPostController@indexAction')->name('ListPost');
            Route::get('add-new-post', 'Post\CreatePostController@indexAction')->name('CreatePost');
            Route::post('action-add-new-post', 'Post\CreatePostController@saveAction')->name('SaveCreatePost');
            Route::get('update-post/{post_id}', 'Post\UpdatePostController@indexAction')->name('UpdatePost');
            Route::post('action-update-post/{post_id}', 'Post\UpdatePostController@saveAction')->name('SaveUpdatePost');
            Route::get('delete-post/{post_id}', 'Post\ListPostController@deleteAction')->name('DeletePost');
            /**
             * Category
             */
            Route::get('list-category', 'Category\ListCategoryController@indexAction')->name('ListCategory');
            Route::get('add-new-category', 'Category\CreateCategoryController@indexAction')->name('CreateCategory');
            Route::post('action-add-new-category', 'Category\CreateCategoryController@saveAction')->name('SaveCreateCategory');
            Route::get('update-category/{category_id}', 'Category\UpdateCategoryController@indexAction')->name('UpdateCategory');
            Route::post('action-update-category/{category_id}', 'Category\UpdateCategoryController@saveAction')->name('SaveUpdateCategory');
            Route::get('delete-category/{category_id}', 'Category\ListCategoryController@deleteAction')->name('DeleteCategory');
            /**
             * Page Router
             */
            Route::get('list-page', 'Page\ListPageController@indexAction')->name('ListPage');
            Route::get('add-new-page', 'Page\CreatePageController@indexAction')->name('CreatePage');
            Route::post('action-add-new-page', 'Page\CreatePageController@saveAction')->name('SaveCreatePage');
            Route::get('update-page/{page_id}', 'Page\UpdatePageController@indexAction')->name('UpdatePage');
            Route::post('action-update-page/{page_id}', 'Page\UpdatePageController@saveAction')->name('SaveUpdatePage');
            Route::get('delete-page/{page_id}', 'Page\ListPageController@deleteAction')->name('DeletePage');
            /**
             * User 
             */
            Route::get('list-user', 'User\ListUserController@indexAction')->name('ListUser');
            Route::get('update-user/{user_id}', 'User\UpdateUserController@indexAction')->name('UpdateUser');
            Route::post('action-update-user/{user_id}', 'User\UpdateUserController@saveAction')->name('SaveUpdateUser');
            Route::get('delete-user/{user_id}', 'User\ListUserController@deleteAction')->name('DeleteUser');
            /**
             * Media
             */
            Route::get('media','Media\MediaController@indexAction')->name('MediaPage');
            /**
             * Menu
             */
            Route::get('menu-builder','Menu\MenuBuilderController@indexAction')->name('MenuBuilder');
            Route::post('save-menu-builder','Menu\MenuBuilderController@saveAction')->name('SaveMenuBuilder');
            /**
             * Setting
             */
            Route::get('setting', 'Setting\DefaultSettingController@indexAction')->name('DefaultSettingPage');
            Route::post('save-setting', 'Setting\DefaultSettingController@saveAction')->name('SaveSettingPage');

        });
});
Route::get('user/logout',function() {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
Route::post('user/logout',function() {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
Route::get('user/login','Auth\LoginController@show')->name('login');
Route::post('user/login','Auth\LoginController@authenticate')->name('login');
Route::get('user/register','Auth\RegisterController@show')->name('register');
Route::post('user/register','Auth\RegisterController@create')->name('register');