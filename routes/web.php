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

use App\User;
    
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/rolecheck', function(){
            if(Auth::user()->role == 'Learner'){
            return Redirect::route('home');
            }
            if(Auth::user()->role == 'Trainer'){
                 $profile=User::where('id',Auth::user()->id)->with('profile')->first();
                    if($profile->profile==null){
                        return redirect('/setting');
                    }
            return Redirect::route('trainer');
            }
});

Route::get('/notFound', 'HomeController@notFound')->name('notFound');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/privacy', 'HomeController@privacy')->name('privacy');
Route::get('/term-services', 'HomeController@term')->name('term-services');
Route::get('/earn', 'HomeController@earn')->name('earn');
Route::post('/postearn', 'HomeController@postearn')->name('postearn');
//Route::get('/admin', 'admin\AdminController@index')->name('admin');
//Route::prefix('admin')->group(function(){
//    Route::get('login','Auth\AdminLoginController@showLoginForm');
//    Route::post('login','Auth\AdminLoginController@login')->name('admin-login');
//});


//-------------------------\job/-----------------------------//
Route::get('/job', 'job\JobController@index')->name('job');
Route::get('/job_detail/{joobid}', 'job\JobController@detail')->name('jobDetail');

Route::get('/result', 'result\ResultController@index')->name('result');

Route::get('/admit-card', 'admit\AdmitController@index')->name('admitCard');

Route::get('/getstate', 'extra\LocationController@getState')->name('getstate');
Route::get('/getcity/{id}', 'extra\LocationController@getCity')->name('getcity');


//admission card getadmssion
Route::get('/addmission', 'admission\AdmissionController@index')->name('addmission');
Route::get('/getadmssion/{st}/{ct}/{cat}', 'admission\AdmissionController@getadmssion')->name('getadmssion');



//-------------------------\user/-----------------------------//
Route::group(['middleware' => 'learner'], function () {
    
Route::get('/settings', 'user\DashboardController@setting')->name('settings');
Route::post('/fileUploads', 'user\DashboardController@fileUpload')->name('fileUploads');
Route::post('/add-profiles', 'user\DashboardController@addProfile')->name('addprofiles');
    
Route::get('/home/{pid?}', 'user\DashboardController@index')->name('home');
Route::post('/create-folder', 'user\DashboardController@createFolder')->name('create-folder');
Route::post('/user404', 'user\DashboardController@user404')->name('user404');


Route::get('/u-board', 'user\BoardController@index')->name('u-board');
Route::post('/create-uboard', 'user\BoardController@create')->name('create-uboard');
Route::get('/view-uboard/{id}', 'user\BoardController@view')->name('view-uboard');

Route::post('/create-udirectory', 'user\BoardController@create_dir')->name('create-udir');
Route::post('/create-umatter', 'user\BoardController@create_amatter')->name('create-umatter');
Route::get('/view-udirectory/{id}', 'user\BoardController@view_dir')->name('view-udir');

Route::get('/view-ufile/{id}', 'user\BoardController@view_file')->name('view-ufile');
Route::post('/create_mail', 'user\BoardController@create_mail')->name('create-mail');
Route::post('/invite-in-board', 'user\BoardController@inviteInBoard')->name('invite-in-board');
Route::post('/file-pdf-user', 'user\BoardController@userFilePdf')->name('file-pdf-user');

});
//-------------------------\user/-----------------------------//

//-------------------------\trainer/-----------------------------//
Route::group(['middleware' => 'trainer'], function () {
Route::get('/setting', 'trainer\DashboardController@setting')->name('setting');
Route::post('/fileUpload', 'trainer\DashboardController@fileUpload')->name('fileUpload');
Route::post('/add-profile', 'trainer\DashboardController@addProfile')->name('addprofile');

Route::post('/trainer404', 'trainer\DashboardController@trainer404')->name('trainer404');
Route::get('/trainer', 'trainer\DashboardController@index')->name('trainer');
Route::get('/profile', 'trainer\ProfileController@index')->name('profile');

Route::get('/a-board', 'trainer\BoardController@index')->name('a-board');
Route::post('/create-aboard', 'trainer\BoardController@create')->name('create-aboard');
Route::get('/view-aboard/{id}', 'trainer\BoardController@view')->name('view-aboard');


Route::post('/create-adirectory', 'trainer\BoardController@create_dir')->name('create-adir');
Route::post('/create-amatter', 'trainer\BoardController@create_amatter')->name('create-amatter');
Route::get('/view-adirectory/{id}', 'trainer\BoardController@view_dir')->name('view-adir');

Route::get('/view-afile/{id}', 'trainer\BoardController@view_file')->name('view-afile');
Route::post('/create_amail', 'trainer\BoardController@create_mail')->name('create-amail');
Route::post('/invite-in-aboard', 'trainer\BoardController@inviteInBoard')->name('invite-in-aboard');
Route::post('/file-pdf-trainer', 'trainer\BoardController@trainerFilePdf')->name('file-pdf-trainer');
});
//-------------------------\trainer/-----------------------------//
