<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeSliderController;

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

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index_page')->name('index.page');
    Route::get('about', 'about_page')->name('about.page');
    Route::get('sevices', 'services_page')->name('services.page');
    Route::get('contact', 'contact_page')->name('contact.page');
    Route::get('blog', 'blog_page')->name('blog.page');
    Route::get('blog-single', 'blog_details_page')->name('blog.single.page');
    Route::get('portfolio', 'portfolio_page')->name('portfolio.page');
    Route::get('portfolio-single', 'portfolio_details_page')->name('portfolio.single.page');
});

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboardData')->middleware(['verified'])->name('dashboard');
        Route::get('/dashboard/logout' , 'destroy')->name('dashboard.logout');
        Route::get('/dashboard/profile' , 'showProfile')->name('show.profile');
        Route::get('/edit/profile' , 'editProfile')->name('edit.profile');
        Route::post('/store/profile' , 'storeProfile')->name('store.profile');
    
        Route::get('/change/password' , 'changePassword')->name('change.password');
        Route::post('/update/password' , 'updatePassword')->name('update.password');

        Route::get('/dashboard/all-users' , 'showAllUsers')->name('show.all.users');
        Route::get('/edit/user{user_id}' , 'editUser')->name('edit.user');
        Route::post('/admin/store/user/profile{user_id}' , 'adminStoreUserProfile')->name('admin.store.user.profile');
        Route::get('/admin/change/user/password{user_id}' , 'adminChangeUserPassword')->name('admin.change.user.password');
        Route::post('/admin/update/user/password{user_id}' , 'adminUpdateUserPassword')->name('admin.update.user.password');
    });

    Route::controller(HomeSliderController::class)->group(function () {
        Route::get('home/slide', 'show')->name('home.slider');
        Route::post('update/slider', 'update')->name('update.slider');
    });

    Route::controller(AboutController::class)->group(function () {
        Route::get('about/info', 'show')->name('about.info');
        Route::post('update/about', 'update')->name('update.about');

        Route::get('about/multi/image', 'aboutMultiImage')->name('about.multi.image');
        Route::post('update/about/multi/image', 'storeMultiImage')->name('update.about.multi.image');
    });
    
});






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
