<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

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

        // Homepage Management
       // Route::prefix('homepage')->name('homepage.')->group(function () {
         //   Route::get('/content', [AdminController::class, 'homepageContent'])->name('content');
          //  Route::post('/content', [AdminController::class, 'updateHomepageContent'])->name('content.update');
       // });

       // Homepage Management
        Route::prefix('homepage')->name('homepage.')->group(function () {
            Route::get('/hero', [AdminController::class, 'homepageHero'])->name('hero');
            Route::post('/hero', [AdminController::class, 'updateHomepageHero'])->name('hero.update');
            Route::get('/about', [AdminController::class, 'homepageAbout'])->name('about');
            Route::post('/about', [AdminController::class, 'updateHomepageAbout'])->name('about.update');

            Route::get('/mitra', [AdminController::class, 'homepageMitra'])->name('mitra');
            Route::get('/mitra/create', [AdminController::class, 'createHomepageMitra'])->name('mitra.create'); // Add this line
            Route::post('/mitra', [AdminController::class, 'storeHomepageMitra'])->name('mitra.store'); // Add this line
            Route::get('/mitra/{id}/edit', [AdminController::class, 'editHomepageMitra'])->name('mitra.edit'); // Optional: for editing
            Route::post('/mitra/{id}', [AdminController::class, 'updateHomepageMitra'])->name('mitra.update');
            Route::delete('/mitra/{id}', [AdminController::class, 'deleteHomepageMitra'])->name('mitra.delete');

            // Product Management
            Route::get('/product', [AdminController::class, 'homepageProduct'])->name('product');
            Route::get('/product/create', [AdminController::class, 'createHomepageProduct'])->name('product.create');
            Route::post('/product', [AdminController::class, 'storeHomepageProduct'])->name('product.store');
            Route::get('/product/{id}/edit', [AdminController::class, 'editHomepageProduct'])->name('product.edit');
            Route::put('/product/{id}', [AdminController::class, 'updateHomepageProduct'])->name('product.update');
            Route::delete('/product/{id}', [AdminController::class, 'deleteHomepageProduct'])->name('product.delete');
        });
        
        // Edu Management
        Route::prefix('edu')->name('edu.')->group(function () {
            Route::get('/hero', [AdminController::class, 'eduHero'])->name('hero');
            Route::post('/hero', [AdminController::class, 'updateEduHero'])->name('hero.update');
            Route::get('/about', [AdminController::class, 'eduAbout'])->name('about');
            Route::post('/about', [AdminController::class, 'updateEduAbout'])->name('about.update');
            Route::get('/features', [AdminController::class, 'eduFeatures'])->name('features');
            Route::post('/features', [AdminController::class, 'updateEduFeatures'])->name('features.update');
            Route::get('/download', [AdminController::class, 'eduDownload'])->name('download');
            Route::post('/download', [AdminController::class, 'updateEduDownload'])->name('download.update');
        });
        
        // Canteen Management
        Route::prefix('canteen')->name('canteen.')->group(function () {
            Route::get('/hero', [AdminController::class, 'canteenHero'])->name('hero');
            Route::post('/hero', [AdminController::class, 'updateCanteenHero'])->name('hero.update');
            Route::get('/about', [AdminController::class, 'canteenAbout'])->name('about');
            Route::post('/about', [AdminController::class, 'updateCanteenAbout'])->name('about.update');
            Route::get('/features', [AdminController::class, 'canteenFeatures'])->name('features');
            Route::post('/features', [AdminController::class, 'updateCanteenFeatures'])->name('features.update');
        });
        
        // School Management
        Route::prefix('school')->name('school.')->group(function () {
            Route::get('/hero', [AdminController::class, 'schoolHero'])->name('hero');
            Route::post('/hero', [AdminController::class, 'updateSchoolHero'])->name('hero.update');
            Route::get('/about', [AdminController::class, 'schoolAbout'])->name('about');
            Route::post('/about', [AdminController::class, 'updateSchoolAbout'])->name('about.update');
            Route::get('/features', [AdminController::class, 'schoolFeatures'])->name('features');
            Route::post('/features', [AdminController::class, 'updateSchoolFeatures'])->name('features.update');
            Route::get('/download', [AdminController::class, 'schoolDownload'])->name('download');
            Route::post('/download', [AdminController::class, 'updateSchoolDownload'])->name('download.update');
        });
        
        Route::prefix('parents')->name('parents.')->group(function () {
            // Hero Section
            Route::get('/hero', [AdminController::class, 'parentsHero'])->name('hero');
            Route::post('/hero', [AdminController::class, 'updateParentsHero'])->name('hero.update');
    
            // About Section
            Route::get('/about', [AdminController::class, 'parentsAbout'])->name('about');
            Route::post('/about', [AdminController::class, 'updateParentsAbout'])->name('about.update');
            
            // Features Section (Orang Tua Gak Risau)
            Route::get('/features', [AdminController::class, 'parentsFeatures'])->name('features');
            Route::post('/features', [AdminController::class, 'updateParentsFeatures'])->name('features.update');
            
            // Features Items Management
            Route::get('/features/items', [AdminController::class, 'parentsFeaturesItems'])->name('features.items');
            Route::get('/features/items/create', [AdminController::class, 'createParentsFeaturesItem'])->name('features.items.create');
            Route::post('/features/items', [AdminController::class, 'storeParentsFeaturesItem'])->name('features.items.store');
            Route::get('/features/items/{id}/edit', [AdminController::class, 'editParentsFeaturesItem'])->name('features.items.edit');
            Route::put('/features/items/{id}', [AdminController::class, 'updateParentsFeaturesItem'])->name('features.items.update');
            Route::delete('/features/items/{id}', [AdminController::class, 'deleteParentsFeaturesItem'])->name('features.items.delete');
            
            // App Download Section
            Route::get('/download', [AdminController::class, 'parentsDownload'])->name('download');
            Route::post('/download', [AdminController::class, 'updateParentsDownload'])->name('download.update');
            
        });
        
        Route::prefix('flexycazh')->name('flexycazh.')->group(function () {
            // Hero Section
            Route::get('/hero', [AdminController::class, 'flexycazhHero'])->name('hero');
            Route::post('/hero', [AdminController::class, 'updateFlexycazhHero'])->name('hero.update');
    
            // features Section
            Route::get('/features', [AdminController::class, 'flexycazhFeatures'])->name('features');
            Route::post('/features', [AdminController::class, 'updateFlexycazhFeatures'])->name('features.update');

            // tutorial Section
            Route::get('/tutorial', [AdminController::class, 'flexycazhTutorial'])->name('tutorial');
            Route::post('/tutorial', [AdminController::class, 'updateFlexycazhTutorial'])->name('tutorial.update');
        });

        // AJAX Routes
        Route::prefix('ajax')->name('ajax.')->group(function () {
            Route::post('/upload-image', [AdminController::class, 'uploadImage'])->name('upload.image');
            Route::get('/content-settings', [AdminController::class, 'getContentSettings'])->name('content.settings');
        });
    });
});

// Redirect root admin route to login
//Route::redirect('/admin', '/admin/login');
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});