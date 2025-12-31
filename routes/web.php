
<?php
// ...existing code...

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OurBusinessController;

// AJAX endpoints for sustainability sections
Route::get('/ajax/green-initiatives', [\App\Http\Controllers\HomeController::class, 'greenInitiativesAjax']);
Route::get('/ajax/community-impact', [\App\Http\Controllers\HomeController::class, 'communityImpactAjax']);
Route::get('/ajax/employee-engagement', [\App\Http\Controllers\HomeController::class, 'employeeEngagementAjax']);

// Client-side Sustainability pages
Route::get('/green-initiatives', [HomeController::class, 'green_initiatives'])->name('green-initiatives');
Route::get('/green-initiatives-detail/{id}', [HomeController::class, 'green_initiatives_detail'])->name('green-initiatives-detail');
Route::get('/community-impact', [HomeController::class, 'community_impact'])->name('community-impact');
Route::get('/community-impact-detail/{id}', [HomeController::class, 'community_impact_detail'])->name('community-impact-detail');
Route::get('/employee-engagement', [HomeController::class, 'employee_engagement'])->name('employee-engagement');
Route::get('/employee-engagement-detail/{id}', [HomeController::class, 'employee_engagement_detail'])->name('employee-engagement-detail');

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/media-press', [HomeController::class, 'media_press'])->name('media-press');
Route::get('/media-news', [HomeController::class, 'media_news'])->name('media-news');
Route::get('/news-with-images', [HomeController::class, 'newsWithImages']);
Route::get('/accolades', [HomeController::class, 'accolades'])->name('accolades');
Route::get('/awards', [HomeController::class, 'awards'])->name('awards');
Route::get('/awards-with-images', [\App\Http\Controllers\HomeController::class, 'awardsWithImages']);

Route::get('/our-businesses', [HomeController::class, 'our_businesses'])->name('our-businesses');
Route::get('/our-businesses-detail', [HomeController::class, 'our_businesses_detail'])->name('our-businesses-detail');
Route::get('/our-businesses-detail/{id}', [HomeController::class, 'our_businesses_detail'])->name('our-businesses-detail');

Route::get('/contact-information', [HomeController::class, 'contact_information'])->name('contact_us.contact-information');
Route::get('/career', [HomeController::class, 'career'])->name('contact_us.career');
Route::get('/registration', [HomeController::class, 'registration'])->name('contact_us.registration');

Route::get('/corporate-governance', [HomeController::class, 'corporate_governance'])->name('corporate-governance');
Route::get('/shareholders-documents', [HomeController::class, 'shareholders_documents'])->name('shareholders-documents');
Route::get('/documents/{type}', [HomeController::class, 'documents_by_type'])->name('documents-by-type');
Route::get('/bursa-announcements', [HomeController::class, 'bursa_announcements'])->name('bursa-announcements');
Route::get('/corporate-information', [HomeController::class, 'corporate_information'])->name('corporate-information');

Route::get('/sustainability-journey', [HomeController::class, 'sustainability_journey'])->name('sustainability-journey');
Route::get('/sustainability/performance-highlight-detail', [HomeController::class, 'performance_highlight_detail'])->name('performance-highlight-detail');
Route::get('/sustainability/sustainability-governance-detail', [HomeController::class, 'sustainability_governance_detail'])->name('sustainability-governance-detail');
Route::get('/green-initiatives', [HomeController::class, 'green_initiatives'])->name('green-initiatives');
Route::get('/community-impact', [HomeController::class, 'community_impact'])->name('community-impact');
Route::get('/community-impact-detail', [HomeController::class, 'community_impact_detail'])->name('community-impact-detail');
Route::get('/employee-engagement', [HomeController::class, 'employee_engagement'])->name('employee-engagement');

Route::get('/corporate-profile', [HomeController::class, 'corporate_profile'])->name('corporate-profile');
Route::get('/leadership-team', [HomeController::class, 'leadership_team'])->name('leadership-team');

Route::get('/our-businesses/load-more', [HomeController::class, 'our_businesses_load_more'])->name('our_businesses.load_more');

Route::post('/register-interest', [HomeController::class, 'saveRegisterInterest'])->name('saveRegisterInterest');

Route::get('/news/{id}', [HomeController::class, 'newsDetail'])->name('news.detail');

Auth::routes();
// auth()->routes();

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix'=> 'admin', 'as'=> 'admin.'], function () {
        // Green Initiatives, Community Impact, Employee Engagement Management
    Route::resource('green_initiatives', App\Http\Controllers\Admin\GreenInitiativeController::class);
    Route::resource('community_impacts', App\Http\Controllers\Admin\CommunityImpactController::class);
    Route::resource('employee_engagements', App\Http\Controllers\Admin\EmployeeEngagementController::class);
    // Image upload for Dropzone (news, etc)
    Route::post('images/upload/{type}/{id}', [\App\Http\Controllers\Admin\ImageController::class, 'upload'])->name('images.upload');
    // News Management
    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
    Route::get('news/all', [\App\Http\Controllers\Admin\NewsController::class, 'apiIndex'])->name('news.api-index');
    // Award Management
    Route::resource('awards', \App\Http\Controllers\AwardController::class);
    // Press Release CRUD
    Route::resource('press-releases', \App\Http\Controllers\PressReleaseController::class);

    // Document Management
    Route::resource('documents', \App\Http\Controllers\Admin\DocumentController::class);

    // Performance Highlights Management
    Route::resource('performance-highlights', \App\Http\Controllers\Admin\PerformanceHighlightController::class);

    // Sustainability Overview Management
    Route::resource('sustainability-overviews', \App\Http\Controllers\Admin\SustainabilityOverviewController::class);

    // Sustainability Goals Management
    Route::resource('sustainability-goals', \App\Http\Controllers\Admin\SustainabilityGoalController::class);

    // Sustainability Governance Management
    Route::resource('sustainability-governances', \App\Http\Controllers\Admin\SustainabilityGovernanceController::class);

    // Our Commitments Management
    Route::resource('our-commitments', \App\Http\Controllers\Admin\OurCommitmentController::class);

    // Sustainability Reports Management
    Route::resource('sustainability-reports', \App\Http\Controllers\Admin\SustainabilityReportController::class);

    // Registered Interest admin page
    Route::get('/register-interest', [AdminHomeController::class, 'registerInterestIndex'])->name('register-interest.index');

        Route::post('/upload', [FileController::class, 'apiUploadFile'])->name('upload');
        Route::get('/', [AdminHomeController::class,'index'])->name('dashboard');

        Route::group(['prefix'=> 'users','as'=> 'users.'], function () {
            Route::get('/', [UserController::class,'index'])->name('index');
            Route::get('/new', [UserController::class,'create'])->name('new');
            Route::post('/', [UserController::class,'store'])->name('store');
            Route::get('/{user}/edit', [UserController::class,'edit'])->name('edit');
            Route::put('/{user}', [UserController::class,'update'])->name('update');
            Route::get('/all', [UserController::class,'apiIndex'])->name('api-index');
            Route::delete('/{user}', [UserController::class,'destroy'])->name('delete');
            Route::patch('/{user}/active', [UserController::class,'active'])->name('active');
            Route::put('/{user}/reset-password', [UserController::class,'apiResetPassword'])->name('reset');
        });

        Route::group(['prefix'=> 'blogs','as'=> 'blogs.'], function () {
            Route::get('/', [BlogController::class,'index'])->name('index');
            Route::get('/all', [BlogController::class,'apiIndex'])->name('api-index');
            Route::get('/new', [BlogController::class,'create'])->name('new');
            Route::post('/', [BlogController::class,'store'])->name('store');
            Route::get('/{blog}/edit', [BlogController::class,'edit'])->name('edit');
            Route::put('/{blog}', [BlogController::class,'update'])->name('update');
            Route::delete('/{blog}', [BlogController::class,'destroy'])->name('delete');
            Route::patch('/{blog}/publish', [BlogController::class, 'publish']);
            Route::patch('/{blog}/archive', [BlogController::class, 'archive']);
        });

        Route::group(['prefix'=> 'projects','as'=> 'projects.'], function () {
            Route::get('/', [ProjectController::class,'index'])->name('index');
            Route::get('/all', [ProjectController::class,'apiIndex'])->name('api-index');
            Route::get('/new', [ProjectController::class,'create'])->name('new');
            Route::post('/', [ProjectController::class,'store'])->name('store');
            Route::get('/{project}/edit', [ProjectController::class,'edit'])->name('edit');
            Route::put('/{project}', [ProjectController::class,'update'])->name('update');
            Route::delete('/{project}', [ProjectController::class,'destroy'])->name('delete');
            Route::patch('/{project}/publish', [ProjectController::class, 'publish']);
            Route::patch('/{project}/archive', [ProjectController::class, 'archive']);
        });

        Route::group(['prefix'=> 'slides','as'=> 'slides.'], function () {
            Route::get('/', [SlideController::class,'index'])->name('index');
            Route::get('/all', [SlideController::class,'apiIndex'])->name('api-index');
            Route::get('/new', [SlideController::class,'create'])->name('new');
            Route::post('/', [SlideController::class,'store'])->name('store');
            Route::get('/{slide}/edit', [SlideController::class,'edit'])->name('edit');
            Route::put('/{slide}', [SlideController::class,'update'])->name('update');
            Route::delete('/{slide}', [SlideController::class,'destroy'])->name('delete');
            Route::patch('/{slide}/publish', [SlideController::class, 'publish']);
            Route::patch('/{slide}/archive', [SlideController::class, 'archive']);
        });
    });
});
