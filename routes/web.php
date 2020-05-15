<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::group(['namespace' => 'Auth'], function () {
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::match(['GET', 'POST'], 'login', 'LoginController@index')->name('login');
    Route::match(['GET', 'POST'], 'register', 'RegisterController@register')->name('register');
});
//Auth::routes();

// Redirect user role wise
Route::get('/home', 'HomeController@index')->name('home');

// If redirect admin
Route::group(['middleware' => ['auth:web'], 'namespace' => 'Backend'], function () {
    Route::get('/admin', 'DashboardController@index')->name('admin');
    Route::get('/user', 'DashboardController@index')->name('user');
    Route::get('/trainer', 'DashboardController@index')->name('trainer');
    //Route::get('/admin', 'DashboardController@index')->name('admin');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    //Module management
    Route::get('/module/delete/{id}', 'ModulesController@destroy');
    Route::resource('module', 'ModulesController');

    // Roles & Permission Module
    Route::get('/rolepermission/delete/{id}', 'ModulesController@destroy');
    Route::resource('rolepermission', 'RolesPermissionController');

    // Trainer Management
    Route::get('/trainerManagement/delete/{id}', 'TrainerController@destroy');
    Route::resource('trainerManagement', 'TrainerController');

    // User Management
    Route::get('/UserManagement/delete/{id}', 'UserController@destroy');
    Route::resource('UserManagement', 'UserController');

    // Categories Management
    Route::get('/categoriesManagement/edit/{id}', 'CategoriesController@edit');
    Route::post('/categoriesManagement/update/{id}', 'CategoriesController@update')->name('categoriesManagement.update');
    Route::get('/categoriesManagement/delete/{id}', 'CategoriesController@destroy');
    Route::resource('categoriesManagement', 'CategoriesController');

    // CMS-Pages Managment
    Route::match(['GET', 'POST'], 'cms_aboutus', 'CMSPagesController@aboutUs')->name('cms_aboutus');
    Route::match(['GET', 'POST'], 'cms_contactus', 'CMSPagesController@contactus')->name('cms_contactus');

    // Site Setting
    Route::get('/setting', 'SettingController@siteSetting')->name('setting');
    Route::put('/setting/update', 'SettingController@update')->name('settingUpdate');

});
