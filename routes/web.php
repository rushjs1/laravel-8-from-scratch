<?php
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
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
//home
Route::get('/', [PostController::class, 'index'])->name('home'); 

//posts
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store'])->middleware('auth');

//register
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

//login
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');

//logout
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//newsletter
Route::post('newsletter', NewsletterController::class);

//admin stuff
Route::middleware('can:admin')->group(function () {
    Route::get('admin/posts/create', [AdminController::class, 'create']);
    Route::get('admin/posts', [AdminController::class, 'index']);
    Route::get('admin/dashboard', [AdminController::class, 'show']);
    Route::get('admin/posts/{post}/edit', [AdminController::class, 'edit']);
    Route::post('admin/posts', [AdminController::class, 'store']);
    Route::patch('admin/posts/{post}', [AdminController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminController::class, 'destroy']);
});


//Route::get('category/{category:slug}', function(Category $category){
//    return view('posts',[
//        'posts' => $category->posts,
//        'currentCategories' => $category,
//        'categories' => Category::all()
//    ]);
//});

//Route::get('authors/{author:username}', function(User $author){
//    return view('posts.index', [
//        'posts' => $author->posts,
//    ]);
//});
