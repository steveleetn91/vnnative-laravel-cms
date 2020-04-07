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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function () {
        Route::middleware(['auth'])->group(function() {
            Route::get('dashboard', 'HomeController@index')->name('dashboard');
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
             * Page Router
             */
            Route::get('list-page', 'Page\ListPageController@indexAction')->name('ListPage');
            Route::get('add-new-page', 'Page\CreatePageController@indexAction')->name('CreatePage');
            Route::post('action-add-new-page', 'Page\CreatePageController@saveAction')->name('SaveCreatePage');
            Route::get('update-page/{page_id}', 'Page\UpdatePageController@indexAction')->name('UpdatePage');
            Route::post('action-update-page/{page_id}', 'Page\UpdatePageController@saveAction')->name('SaveUpdatePage');
            Route::get('delete-page/{page_id}', 'Page\ListPageController@deleteAction')->name('DeletePage');
            /**
             * Media
             */
            Route::get('media','Media\MediaController@indexAction')->name('MediaPage');
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