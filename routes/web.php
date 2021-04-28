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

Route::get('/test3', function () {
    return view('dashboard');
});
//Route::get('/test',[\App\Http\Controllers\TestController::class, 'index']);

################################ Login user ######################################
//route for login user
Route::get('/login', [\App\Http\Controllers\Web\LoginController::class, 'index'])->name('login.user');
Route::post('/login', [\App\Http\Controllers\Web\LoginController::class, 'login']);
Route::get('/register', [\App\Http\Controllers\Web\RegisterController::class, 'index']);
Route::Post('/register', [\App\Http\Controllers\Web\RegisterController::class, 'register']);
Route::get('/logout', [\App\Http\Controllers\Admin\LoginController::class, 'logout']);

//route login with social media
Route::get('login/{provider}', [\App\Http\Controllers\Web\SocialController::class, 'redirect']);
Route::get('login/{provider}/callback', [\App\Http\Controllers\Web\SocialController::class, 'Callback']);
Route::get('login/twitter/callback', [\App\Http\Controllers\Web\SocialController::class, 'TwitterCallback']);
#>>>>>>>>>>>>>>>>>>>>>>>>>>> Rest Password <<<<<<<<<<<<<<<<<<<<<<<<<<<

Route::get('/forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'create']);


Route::post('/forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('/reset-password/{token}', [\App\Http\Controllers\Auth\NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('/reset-password', [\App\Http\Controllers\Auth\NewPasswordController::class, 'store'])
    ->name('password.update');

##############################################################################
//,'middleware' => ['auth_admin']
Route::group(['prefix' => '/'], function () {
    //route for testing
    Route::get('/', [\App\Http\Controllers\Web\HomeController::class, 'index']);
    Route::resource('/post', '\App\Http\Controllers\Web\PostController');
    Route::resource('profile', '\App\Http\Controllers\Web\UserController');
    Route::resource('/agreements', '\App\Http\Controllers\Web\AgreementController');


    Route::get('/manage_posts',        [\App\Http\Controllers\Web\PostRequestController::class, 'index']);
    Route::get('/send_request/{id}',   [\App\Http\Controllers\Web\PostRequestController::class, 'sendRequest']);
    Route::get('/users_requests/{id}', [\App\Http\Controllers\Web\PostRequestController::class, 'sendRequest']);
    Route::get('/delete_request/{id}', [\App\Http\Controllers\Web\PostRequestController::class, 'deleteRequest']);
    Route::get('/accept_request/{id}', [\App\Http\Controllers\Web\PostRequestController::class, 'acceptRequest']);

    Route::get('/agreement_request/{id}', [\App\Http\Controllers\Web\AgreementRequestController::class, 'create']);
    Route::get('/accept_agreement/{id}', [\App\Http\Controllers\Web\AgreementRequestController::class, 'accept']);
    Route::get('/reject_agreement/{id}', [\App\Http\Controllers\Web\AgreementRequestController::class, 'reject']);
    Route::get('/test', [\App\Http\Controllers\TestController::class, 'index']);
    // Route::Post('/test', [\App\Http\Controllers\TestController::class, 'store']);
});

##############################################################################

//
//############################### login admin #######################################
//
//    Route::get('/login_admin',[\App\Http\Controllers\Admin\LoginController::class, 'index'])->name('login.admin');
//    Route::post('/login_admin',[\App\Http\Controllers\Admin\LoginController::class, 'login']);
//
//############################## End login Admin ###################################


Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {

    //route for login admin

    //route manage admins (edit/delete/show/create)
    Route::resource('/manage', '\App\Http\Controllers\Admin\AdminsController');

    //manage users in admin dashboard
    Route::resource('/users', '\App\Http\Controllers\Admin\UsersController');

    Route::get('/users_requests', [\App\Http\Controllers\Admin\UsersRequestsController::class, 'index']);
    Route::get('/confirm_user/{id}', [\App\Http\Controllers\Admin\UsersRequestsController::class, 'approve']);

    //manage roles in admin dashboard
    Route::resource('/roles', '\App\Http\Controllers\Admin\RolesController');

    //manage technologies in admin dashboard
    Route::resource('/skills', '\App\Http\Controllers\Admin\SkillController');

    //manage countries in admin dashboard
    Route::resource('/countries', '\App\Http\Controllers\Admin\CountryController');
});





//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth_admin'])->name('dashboard');
//
//
//require __DIR__.'/auth_admin.php';
