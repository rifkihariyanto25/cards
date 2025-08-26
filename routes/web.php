<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;

// Homepage controllers
use App\Http\Controllers\Admin\Homepage\HeroController as HomepageHeroController;
use App\Http\Controllers\Admin\Homepage\AboutController as HomepageAboutController;
use App\Http\Controllers\Admin\Homepage\MitraController;
use App\Http\Controllers\Admin\Homepage\ProductController;
use App\Http\Controllers\Admin\Homepage\TestimoniController;

// Edu controllers
use App\Http\Controllers\Admin\Edu\HeroController as EduHeroController;
use App\Http\Controllers\Admin\Edu\AboutController as EduAboutController;
use App\Http\Controllers\Admin\Edu\DownloadController;
use App\Http\Controllers\Admin\Edu\FeaturesController as EduFeaturesController;

// Canteen controllers
use App\Http\Controllers\Admin\Canteen\HeroController as CanteenHeroController;
use App\Http\Controllers\Admin\Canteen\AboutController as CanteenAboutController;
use App\Http\Controllers\Admin\Canteen\FeaturesController as CanteenFeaturesController;

// School controllers
use App\Http\Controllers\Admin\School\HeroController as SchoolHeroController;
use App\Http\Controllers\Admin\School\AboutController as SchoolAboutController;
use App\Http\Controllers\Admin\School\FeaturesController as SchoolFeaturesController;
use App\Http\Controllers\Admin\School\DownloadController as SchoolDownloadController;

// Parents controllers
use App\Http\Controllers\Admin\Parents\HeroController as ParentsHeroController;
use App\Http\Controllers\Admin\Parents\AboutController as ParentsAboutController;
use App\Http\Controllers\Admin\Parents\FeaturesController as ParentsFeaturesController;
use App\Http\Controllers\Admin\Parents\DownloadController as ParentsDownloadController;

// Flexycazh controllers
use App\Http\Controllers\Admin\Flexycazh\HeroController as FlexycazhHeroController;
use App\Http\Controllers\Admin\Flexycazh\FeaturesController as FlexycazhFeaturesController;
use App\Http\Controllers\Admin\Flexycazh\TutorialController as FlexycazhTutorialController;

// User controllers
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\User\EduController;
use App\Http\Controllers\User\ParentsController;
use App\Http\Controllers\User\CanteenController;
use App\Http\Controllers\User\SchoolController;
use App\Http\Controllers\User\FlexycazhController;
use App\Http\Controllers\User\ContactController;

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

        // Homepage Section
        Route::prefix('homepage')->name('homepage.')->group(function () {
            // Hero Section
            Route::get('/hero', [HomepageHeroController::class, 'index'])->name('hero');
            Route::post('/hero', [HomepageHeroController::class, 'update'])->name('hero.update');

            // About Section
            Route::get('/about', [HomepageAboutController::class, 'index'])->name('about');
            Route::post('/about', [HomepageAboutController::class, 'update'])->name('about.update');

            // Mitra Section
            Route::get('/mitra', [MitraController::class, 'homepageMitra'])->name('mitra');
            Route::get('/mitra/create', [MitraController::class, 'createHomepageMitra'])->name('mitra.create');
            Route::post('/mitra', [MitraController::class, 'storeHomepageMitra'])->name('mitra.store');
            Route::get('/mitra/{mitra}/edit', [MitraController::class, 'editHomepageMitra'])->name('mitra.edit');
            Route::put('/mitra/{mitra}', [MitraController::class, 'updateHomepageMitra'])->name('mitra.update');
            Route::delete('/mitra/{mitra}', [MitraController::class, 'deleteHomepageMitra'])->name('mitra.delete');

            // Product Section
            Route::get('/product', [ProductController::class, 'homepageProduct'])->name('product');
            Route::get('/product/create', [ProductController::class, 'createHomepageProduct'])->name('product.create');
            Route::post('/product', [ProductController::class, 'storeHomepageProduct'])->name('product.store');
            Route::get('/product/{product}/edit', [ProductController::class, 'editHomepageProduct'])->name('product.edit');
            Route::put('/product/{product}', [ProductController::class, 'updateHomepageProduct'])->name('product.update');
            Route::delete('/product/{product}', [ProductController::class, 'deleteHomepageProduct'])->name('product.delete');

            // Testimoni Section
            Route::get('/testimoni', [TestimoniController::class, 'homepageTestimoni'])->name('testimoni');
            Route::get('/testimoni/create', [TestimoniController::class, 'createHomepageTestimoni'])->name('testimoni.create');
            Route::post('/testimoni', [TestimoniController::class, 'storeHomepageTestimoni'])->name('testimoni.store');
            Route::get('/testimoni/{testimoni}/edit', [TestimoniController::class, 'editHomepageTestimoni'])->name('testimoni.edit');
            Route::put('/testimoni/{testimoni}', [TestimoniController::class, 'updateHomepageTestimoni'])->name('testimoni.update');
            Route::delete('/testimoni/{testimoni}', [TestimoniController::class, 'deleteHomepageTestimoni'])->name('testimoni.delete');
        });

        // Edu Section
        Route::prefix('edu')->name('edu.')->group(function () {
            // Hero Section
            Route::get('/hero', [EduHeroController::class, 'index'])->name('hero');
            Route::post('/hero', [EduHeroController::class, 'update'])->name('hero.update');

            // About Section
            Route::get('/about', [EduAboutController::class, 'index'])->name('about');
            Route::post('/about', [EduAboutController::class, 'update'])->name('about.update');

            // Features Section
            Route::get('/features', [EduFeaturesController::class, 'eduFeatures'])->name('features');
            Route::get('/features/create', [EduFeaturesController::class, 'createEduFeatures'])->name('features.create');
            Route::post('/features', [EduFeaturesController::class, 'storeEduFeature'])->name('features.store');
            Route::get('/features/{feature}/edit', [EduFeaturesController::class, 'editEduFeature'])->name('features.edit');
            Route::put('/features/{feature}', [EduFeaturesController::class, 'updateEduFeature'])->name('features.update');
            Route::delete('/features/{feature}', [EduFeaturesController::class, 'deleteEduFeature'])->name('features.delete');

            // Download Section
            Route::get('/download', [DownloadController::class, 'index'])->name('download');
            Route::post('/download', [DownloadController::class, 'update'])->name('download.update');
        });

        // Canteen Section
        Route::prefix('canteen')->name('canteen.')->group(function () {
            // Hero Section
            Route::get('/hero', [CanteenHeroController::class, 'index'])->name('hero');
            Route::post('/hero', [CanteenHeroController::class, 'update'])->name('hero.update');

            // About Section
            Route::get('/about', [CanteenAboutController::class, 'index'])->name('about');
            Route::post('/about', [CanteenAboutController::class, 'update'])->name('about.update');

            // Features CRUD
            Route::get('/features', [CanteenFeaturesController::class, 'index'])->name('features');
            Route::get('/features/create', [CanteenFeaturesController::class, 'create'])->name('features.create');
            Route::post('/features', [CanteenFeaturesController::class, 'store'])->name('features.store');
            Route::get('/features/{feature}/edit', [CanteenFeaturesController::class, 'edit'])->name('features.edit');
            Route::put('/features/{feature}', [CanteenFeaturesController::class, 'update'])->name('features.update');
            Route::delete('/features/{feature}', [CanteenFeaturesController::class, 'delete'])->name('features.delete');
        });

        // School Section
        Route::prefix('school')->name('school.')->group(function () {
            // Hero Section
            Route::get('/hero', [SchoolHeroController::class, 'index'])->name('hero');
            Route::post('/hero', [SchoolHeroController::class, 'update'])->name('hero.update');

            // About Section
            Route::get('/about', [SchoolAboutController::class, 'index'])->name('about');
            Route::post('/about', [SchoolAboutController::class, 'update'])->name('about.update');

            // Features CRUD
            Route::get('/features', [SchoolFeaturesController::class, 'index'])->name('features');
            Route::get('/features/create', [SchoolFeaturesController::class, 'create'])->name('features.create');
            Route::post('/features', [SchoolFeaturesController::class, 'store'])->name('features.store');
            Route::get('/features/{feature}/edit', [SchoolFeaturesController::class, 'edit'])->name('features.edit');
            Route::put('/features/{feature}', [SchoolFeaturesController::class, 'update'])->name('features.update');
            Route::delete('/features/{feature}', [SchoolFeaturesController::class, 'delete'])->name('features.delete');

            // Download Section
            Route::get('/download', [SchoolDownloadController::class, 'index'])->name('download');
            Route::post('/download', [SchoolDownloadController::class, 'update'])->name('download.update');
        });

        // Parents Section
        Route::prefix('parents')->name('parents.')->group(function () {
            // Hero Section
            Route::get('/hero', [ParentsHeroController::class, 'index'])->name('hero');
            Route::post('/hero', [ParentsHeroController::class, 'update'])->name('hero.update');

            // About Section
            Route::get('/about', [ParentsAboutController::class, 'index'])->name('about');
            Route::post('/about', [ParentsAboutController::class, 'update'])->name('about.update');

            // Features Section
            Route::get('/features', [ParentsFeaturesController::class, 'index'])->name('features');
            Route::get('/features/create', [ParentsFeaturesController::class, 'create'])->name('features.create');
            Route::post('/features', [ParentsFeaturesController::class, 'store'])->name('features.store');
            Route::get('/features/{feature}/edit', [ParentsFeaturesController::class, 'edit'])->name('features.edit');
            Route::put('/features/{feature}', [ParentsFeaturesController::class, 'update'])->name('features.update');
            Route::delete('/features/{feature}', [ParentsFeaturesController::class, 'destroy'])->name('features.destroy');

            // Download Section
            Route::get('/download', [ParentsDownloadController::class, 'index'])->name('download');
            Route::post('/download', [ParentsDownloadController::class, 'update'])->name('download.update');
        });

        // Flexycazh Section
        Route::prefix('flexycazh')->name('flexycazh.')->group(function () {
            // Hero Section
            Route::get('/hero', [FlexycazhHeroController::class, 'index'])->name('hero');
            Route::post('/hero', [FlexycazhHeroController::class, 'update'])->name('hero.update');

            // Features Section
            Route::get('/features', [FlexycazhFeaturesController::class, 'index'])->name('features');
            Route::get('/features/create', [FlexycazhFeaturesController::class, 'create'])->name('features.create');
            Route::post('/features', [FlexycazhFeaturesController::class, 'store'])->name('features.store');
            Route::get('/features/{feature}/edit', [FlexycazhFeaturesController::class, 'edit'])->name('features.edit');
            Route::put('/features/{feature}', [FlexycazhFeaturesController::class, 'update'])->name('features.update');
            Route::delete('/features/{feature}', [FlexycazhFeaturesController::class, 'destroy'])->name('features.destroy');

            // Tutorial Section
            Route::get('/tutorial', [FlexycazhTutorialController::class, 'index'])->name('tutorial');
            Route::post('/tutorial', [FlexycazhTutorialController::class, 'update'])->name('tutorial.update');
        });
    });
});

// Admin root redirect
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});

// routes/web.php (Sesudah - Direkomendasikan)

Route::name('user.')->group(function () {
    Route::get('/', [HomepageController::class, 'index'])->name('homepage'); // Otomatis menjadi 'user.homepage'
    Route::get('/edu', [EduController::class, 'index'])->name('edu');       // Otomatis menjadi 'user.edu'
    Route::get('/parents', [ParentsController::class, 'index'])->name('parents'); // Otomatis menjadi 'user.parents'
    Route::get('/canteen', [CanteenController::class, 'index'])->name('canteen'); // Otomatis menjadi 'user.canteen'
    Route::get('/school', [SchoolController::class, 'index'])->name('school');   // Otomatis menjadi 'user.school'
    Route::get('/flexy', [FlexycazhController::class, 'index'])->name('flexy');     // Otomatis menjadi 'user.flexy'
    Route::get('/contact', [ContactController::class, 'index'])->name('contact'); // Otomatis menjadi 'user.contact'

    Route::post('/flexy/pengajuan', [FlexycazhController::class, 'storePengajuan'])->name('flexy.pengajuan'); // Otomatis menjadi 'user.flexy.pengajuan'
});

// Anda bisa menghapus rute /homepage karena sudah di-handle oleh /
// Route::get('/homepage', [HomepageController::class, 'index'])->name('homepage.alternate');
