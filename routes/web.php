<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;

// homepage
use App\Http\Controllers\Admin\Homepage\HeroController;
use App\Http\Controllers\Admin\Homepage\AboutController;
use App\Http\Controllers\Admin\Homepage\MitraController;
use App\Http\Controllers\Admin\Homepage\ProductController;

use App\Http\Controllers\Admin\EduController;
use App\Http\Controllers\Admin\CanteenController;
use App\Http\Controllers\Admin\SchoolController;
use App\Http\Controllers\Admin\ParentsController;
use App\Http\Controllers\Admin\FlexycazhController;


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
            Route::get('/hero', [HeroController::class, 'index'])->name('hero');
            Route::post('/hero', [HeroController::class, 'update'])->name('hero.update');

            // About Section
            Route::get('/about', [AboutController::class, 'index'])->name('about');
            Route::post('/about', [AboutController::class, 'update'])->name('about.update');

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

        Route::prefix('edu')->name('edu.')->group(function () {
            Route::get('/hero', [EduController::class, 'eduHero'])->name('hero');
            Route::post('/hero', [EduController::class, 'updateEduHero'])->name('hero.update');

            Route::get('/about', [EduController::class, 'eduAbout'])->name('about');
            Route::post('/about', [EduController::class, 'updateEduAbout'])->name('about.update');

            Route::get('/features', [EduController::class, 'eduFeatures'])->name('features');
            Route::post('/features', [EduController::class, 'updateEduFeatures'])->name('features.update');

            Route::get('/download', [EduController::class, 'eduDownload'])->name('download');
            Route::post('/download', [EduController::class, 'updateEduDownload'])->name('download.update');
        });


        // Canteen Management
        Route::prefix('canteen')->name('canteen.')->group(function () {
            Route::get('/hero', [CanteenController::class, 'canteenHero'])->name('hero');
            Route::post('/hero', [CanteenController::class, 'updateCanteenHero'])->name('hero.update');
            Route::get('/about', [CanteenController::class, 'canteenAbout'])->name('about');
            Route::post('/about', [CanteenController::class, 'updateCanteenAbout'])->name('about.update');
            Route::get('/features', [CanteenController::class, 'canteenFeatures'])->name('features');
            Route::post('/features', [CanteenController::class, 'updateCanteenFeatures'])->name('features.update');
        });

        // School Management
        Route::prefix('school')->name('school.')->group(function () {
            Route::get('/hero', [SchoolController::class, 'schoolHero'])->name('hero');
            Route::post('/hero', [SchoolController::class, 'updateSchoolHero'])->name('hero.update');
            Route::get('/about', [SchoolController::class, 'schoolAbout'])->name('about');
            Route::post('/about', [SchoolController::class, 'updateSchoolAbout'])->name('about.update');
            Route::get('/features', [SchoolController::class, 'schoolFeatures'])->name('features');
            Route::post('/features', [SchoolController::class, 'updateSchoolFeatures'])->name('features.update');
            Route::get('/download', [SchoolController::class, 'schoolDownload'])->name('download');
            Route::post('/download', [SchoolController::class, 'updateSchoolDownload'])->name('download.update');
        });

        Route::prefix('parents')->name('parents.')->group(function () {
            // Hero Section
            Route::get('/hero', [ParentsController::class, 'parentsHero'])->name('hero');
            Route::post('/hero', [ParentsController::class, 'updateParentsHero'])->name('hero.update');

            // About Section
            Route::get('/about', [ParentsController::class, 'parentsAbout'])->name('about');
            Route::post('/about', [ParentsController::class, 'updateParentsAbout'])->name('about.update');

            // Features Section (Orang Tua Gak Risau)
            Route::get('/features', [ParentsController::class, 'parentsFeatures'])->name('features');
            Route::post('/features', [ParentsController::class, 'updateParentsFeatures'])->name('features.update');

            // Features Items Management
            Route::get('/features/items', [ParentsController::class, 'parentsFeaturesItems'])->name('features.items');
            Route::get('/features/items/create', [ParentsController::class, 'createParentsFeaturesItem'])->name('features.items.create');
            Route::post('/features/items', [ParentsController::class, 'storeParentsFeaturesItem'])->name('features.items.store');
            Route::get('/features/items/{id}/edit', [ParentsController::class, 'editParentsFeaturesItem'])->name('features.items.edit');
            Route::put('/features/items/{id}', [ParentsController::class, 'updateParentsFeaturesItem'])->name('features.items.update');
            Route::delete('/features/items/{id}', [ParentsController::class, 'deleteParentsFeaturesItem'])->name('features.items.delete');

            // App Download Section
            Route::get('/download', [ParentsController::class, 'parentsDownload'])->name('download');
            Route::post('/download', [ParentsController::class, 'updateParentsDownload'])->name('download.update');
        });

        Route::prefix('flexycazh')->name('flexycazh.')->group(function () {
            // Hero Section
            Route::get('/hero', [FlexycazhController::class, 'flexycazhHero'])->name('hero');
            Route::post('/hero', [FlexycazhController::class, 'updateFlexycazhHero'])->name('hero.update');

            // features Section
            Route::get('/features', [FlexycazhController::class, 'flexycazhFeatures'])->name('features');
            Route::post('/features', [FlexycazhController::class, 'updateFlexycazhFeatures'])->name('features.update');

            // tutorial Section
            Route::get('/tutorial', [FlexycazhController::class, 'flexycazhTutorial'])->name('tutorial');
            Route::post('/tutorial', [FlexycazhController::class, 'updateFlexycazhTutorial'])->name('tutorial.update');
        });

        // AJAX Routes
        Route::prefix('ajax')->name('ajax.')->group(function () {
            Route::post('/upload-image', [FlexycazhController::class, 'uploadImage'])->name('upload.image');
            Route::get('/content-settings', [FlexycazhController::class, 'getContentSettings'])->name('content.settings');
        });
    });
});

// Redirect root admin route to login
//Route::redirect('/admin', '/admin/login');
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});
