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

// Route::get('/test3', function () {
//     return view('dashboard');
// });
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

Route::get('/home', [\App\Http\Controllers\Web\HomeController::class, 'index']);
##############################################################################
//,'middleware' => ['auth_admin']
Route::group(['prefix' => '/', 'middleware' => ['auth_admin']], function () {
    Route::get('/', [\App\Http\Controllers\Web\HomeController::class, 'index']);
    //route for testing
    Route::resource('/post',     '\App\Http\Controllers\Web\PostController');
    Route::post('/post/search',  [\App\Http\Controllers\Web\SearchController::class, 'search']);

    Route::get('projects/{id}',  [\App\Http\Controllers\Web\UserEditController::class, 'editProjects']);
    Route::post('projects/edit', [\App\Http\Controllers\Web\UserEditController::class, 'edit']);
    Route::resource('profile',     '\App\Http\Controllers\Web\UserController');
    Route::resource('/agreements', '\App\Http\Controllers\Web\AgreementController');


    Route::get('/manage_posts',         [\App\Http\Controllers\Web\PostRequestController::class, 'index']);
    Route::get('/category/{id}',        [\App\Http\Controllers\Web\CategoryFilterController::class, 'filter']);
    Route::get('/users_category/{id}',  [\App\Http\Controllers\Web\CategoryFilterController::class, 'userCategory']);
    Route::get('/your/posts/{id}',      [\App\Http\Controllers\Web\CategoryFilterController::class, 'userPost']);

    Route::get('/send_request/{id}',   [\App\Http\Controllers\Web\PostRequestController::class, 'sendRequest']);
    Route::get('/users_requests/{id}', [\App\Http\Controllers\Web\PostRequestController::class, 'sendRequest']);
    Route::get('/delete_request/{id}', [\App\Http\Controllers\Web\PostRequestController::class, 'deleteRequest']);
    Route::get('/accept_request/{id}', [\App\Http\Controllers\Web\PostRequestController::class, 'acceptRequest']);

    Route::get('/agreement_request/{id}', [\App\Http\Controllers\Web\AgreementRequestController::class, 'create']);
    Route::get('/accept_agreement/{id}', [\App\Http\Controllers\Web\AgreementRequestController::class, 'accept']);
    Route::get('/reject_agreement/{id}', [\App\Http\Controllers\Web\AgreementRequestController::class, 'reject']);


    Route::get('/chat', [\App\Http\Controllers\Web\ChatController::class, 'index']);
    Route::get('/chat/{id}', [\App\Http\Controllers\Web\ChatController::class, 'userChat']);
    Route::get('/friend/{id}', [\App\Http\Controllers\Web\ChatController::class, 'getSpeaker'])->name('getFriend');
    Route::get('/message/{id}', [\App\Http\Controllers\Web\ChatController::class, 'getMessage'])->name('getMessage');
    Route::post('/message', [\App\Http\Controllers\Web\ChatController::class, 'sendMessage'])->name('sendMessage');

    Route::get('/test', [\App\Http\Controllers\TestController::class, 'index']);
    // Route::Post('/test', [\App\Http\Controllers\TestController::class, 'store']);
    Route::get('/active/account', function () {
        return view('web.users.active_account');
    });
    Route::get('/active/success', function () {
        return view('web.users.success_message');
    });
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

    //manage categories in admin dashboard
    Route::resource('/categories', '\App\Http\Controllers\Admin\CategoryController');


    //manage posts in admin dashboard
    Route::get('/posts', [\App\Http\Controllers\Admin\PostController::class, 'index']);
    Route::get('/post_delete/{id}', [\App\Http\Controllers\Admin\PostController::class, 'delete']);
    Route::get('/post_reject/{id}', [\App\Http\Controllers\Admin\PostController::class, 'reject']);
    Route::get('/post_view/{id}', [\App\Http\Controllers\Admin\PostController::class, 'view']);
    Route::get('/post_approve/{id}', [\App\Http\Controllers\Admin\PostController::class, 'approve']);
});





//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth_admin'])->name('dashboard');
//
//
//require __DIR__.'/auth_admin.php';
