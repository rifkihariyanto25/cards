<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;

// homepage
use App\Http\Controllers\Admin\Homepage\HeroController as HomepageHeroController;
use App\Http\Controllers\Admin\Homepage\AboutController as HomepageAboutController;
use App\Http\Controllers\Admin\Homepage\MitraController;
use App\Http\Controllers\Admin\Homepage\ProductController;

// Edu
use App\Http\Controllers\Admin\Edu\HeroController as EduHeroController;
use App\Http\Controllers\Admin\Edu\AboutController as EduAboutController;
use App\Http\Controllers\Admin\Edu\DownloadController;
use App\Http\Controllers\Admin\Edu\FeaturesController as EduFeaturesController;


// Canteen (NEW)
use App\Http\Controllers\Admin\Canteen\HeroController as CanteenHeroController;
use App\Http\Controllers\Admin\Canteen\AboutController as CanteenAboutController;
use App\Http\Controllers\Admin\Canteen\FeaturesController as CanteenFeaturesController;

// School
use App\Http\Controllers\Admin\School\HeroController as SchoolHeroController;
use App\Http\Controllers\Admin\School\AboutController as SchoolAboutController;
use App\Http\Controllers\Admin\School\FeaturesController as SchoolFeaturesController;
use App\Http\Controllers\Admin\School\DownloadController as SchoolDownloadController;

// Parents
use App\Http\Controllers\Admin\Parents\HeroController as ParentsHeroController;
use App\Http\Controllers\Admin\Parents\AboutController as ParentsAboutController;
use App\Http\Controllers\Admin\Parents\FeaturesController as ParentsFeaturesController;
use App\Http\Controllers\Admin\Parents\DownloadController as ParentsDownloadController;


// controller
use App\Http\Controllers\Admin\Flexycazh\HeroController as FlexycazhHeroController;
use App\Http\Controllers\Admin\Flexycazh\FeaturesController as FlexycazhFeaturesController;
use App\Http\Controllers\Admin\Flexycazh\TutorialController as FlexycazhTutorialController;



// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {

    // Guest routes (not authenticated)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
    });

    // Protected routes (authenticated)
    Route::middleware('auth:admin')->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Logout
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        Route::prefix('homepage')->name('homepage.')->group(function () {
            // Hero Section
            Route::get('/hero', [HomepageHeroController::class, 'index'])->name('hero');
            Route::post('/hero', [HomepageHeroController::class, 'update'])->name('hero.update');

            // About Section
            Route::get('/about', [HomepageAboutController::class, 'index'])->name('about');
            Route::post('/about', [HomepageAboutController::class, 'update'])->name('about.update');

            // Mitra Section
            Route::get('/mitra', [MitraController::class, 'index'])->name('mitra');
            Route::get('/mitra/create', [MitraController::class, 'create'])->name('mitra.create');
            Route::post('/mitra', [MitraController::class, 'store'])->name('mitra.store');
            Route::get('/mitra/{id}/edit', [MitraController::class, 'edit'])->name('mitra.edit'); // optional
            Route::post('/mitra/{id}', [MitraController::class, 'update'])->name('mitra.update'); // optional
            Route::delete('/mitra/{id}', [MitraController::class, 'delete'])->name('mitra.delete');

            // Product Section
            Route::get('/product', [ProductController::class, 'index'])->name('product');
            Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/product', [ProductController::class, 'store'])->name('product.store');
            Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
            Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('product.delete');
        });

        // Edu Section
        Route::prefix('edu')->name('edu.')->group(function () {
            Route::get('/hero', [EduHeroController::class, 'index'])->name('hero');
            Route::post('/hero/update', [EduHeroController::class, 'update'])->name('hero.update');

            Route::get('/about', [EduAboutController::class, 'index'])->name('about');
            Route::post('/about/update', [EduAboutController::class, 'update'])->name('about.update');

            Route::get('/features', [EduFeaturesController::class, 'index'])->name('features');
            Route::post('/features/update', [EduFeaturesController::class, 'update'])->name('features.update');

            Route::get('/download', [DownloadController::class, 'index'])->name('download');
            Route::post('/download/update', [DownloadController::class, 'update'])->name('download.update');
        });



        // Canteen Section (NEW)
        Route::prefix('canteen')->name('canteen.')->group(function () {
            Route::get('/hero', [CanteenHeroController::class, 'index'])->name('hero');
            Route::post('/hero', [CanteenHeroController::class, 'update'])->name('hero.update');

            Route::get('/about', [CanteenAboutController::class, 'index'])->name('about');
            Route::post('/about', [CanteenAboutController::class, 'update'])->name('about.update');

            Route::get('/features', [CanteenFeaturesController::class, 'index'])->name('features');
            Route::post('/features', [CanteenFeaturesController::class, 'update'])->name('features.update');
        });

        // School Management
        Route::prefix('school')->name('school.')->group(function () {
            Route::get('/hero', [SchoolHeroController::class, 'index'])->name('hero');
            Route::post('/hero', [SchoolHeroController::class, 'update'])->name('hero.update');

            Route::get('/about', [SchoolAboutController::class, 'index'])->name('about');
            Route::post('/about', [SchoolAboutController::class, 'update'])->name('about.update');

            Route::get('/features', [SchoolFeaturesController::class, 'index'])->name('features');
            Route::post('/features', [SchoolFeaturesController::class, 'update'])->name('features.update');

            Route::get('/download', [SchoolDownloadController::class, 'index'])->name('download');
            Route::post('/download', [SchoolDownloadController::class, 'update'])->name('download.update');
        });

        Route::prefix('parents')->name('parents.')->group(function () {
            // Hero Section
            Route::get('/hero', [ParentsHeroController::class, 'index'])->name('hero');
            Route::post('/hero', [ParentsHeroController::class, 'update'])->name('hero.update');

            // About Section
            Route::get('/about', [ParentsAboutController::class, 'index'])->name('about');
            Route::post('/about', [ParentsAboutController::class, 'update'])->name('about.update');

            // Features Section (Orang Tua Gak Risau)
            Route::get('/features', [ParentsFeaturesController::class, 'index'])->name('features');
            Route::post('/features', [ParentsFeaturesController::class, 'update'])->name('features.update');

            // Features Items Management
            Route::get('/features/items', [ParentsFeaturesController::class, 'items'])->name('features.items');
            Route::get('/features/items/create', [ParentsFeaturesController::class, 'create'])->name('features.items.create');
            Route::post('/features/items', [ParentsFeaturesController::class, 'store'])->name('features.items.store');
            Route::get('/features/items/{id}/edit', [ParentsFeaturesController::class, 'edit'])->name('features.items.edit');
            Route::put('/features/items/{id}', [ParentsFeaturesController::class, 'updateItem'])->name('features.items.update');
            Route::delete('/features/items/{id}', [ParentsFeaturesController::class, 'destroy'])->name('features.items.delete');

            // App Download Section
            Route::get('/download', [ParentsDownloadController::class, 'index'])->name('download');
            Route::post('/download', [ParentsDownloadController::class, 'update'])->name('download.update');
        });

        Route::prefix('flexycazh')->name('flexycazh.')->group(function () {
            // Hero Section
            Route::get('/hero', [FlexycazhHeroController::class, 'index'])->name('hero');
            Route::post('/hero', [FlexycazhHeroController::class, 'update'])->name('hero.update');

            // Features Section
            Route::get('/features', [FlexycazhFeaturesController::class, 'index'])->name('features');
            Route::post('/features', [FlexycazhFeaturesController::class, 'update'])->name('features.update');

            // // Tutorial Section
            Route::get('/tutorial', [FlexycazhTutorialController::class, 'index'])->name('tutorial');
            Route::post('/tutorial', [FlexycazhTutorialController::class, 'update'])->name('tutorial.update');
        });
    });
});

// Redirect root admin route to login
//Route::redirect('/admin', '/admin/login');
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});

use App\Http\Controllers\User\HomepageController;

Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage');
