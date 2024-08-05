<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');

Route::get('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm'])
    ->name('auth.login.form');
Route::post('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginProcess'])
    ->name('auth.login.process');
Route::post('/cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logoutProcess'])
    ->name('auth.logout.process');

// Route::get('/registrarse', [\App\Http\Controllers\AuthController::class, 'signupForm'])
//     ->name('signup.index');
// Route::post('/registrarse', [\App\Http\Controllers\AuthController::class, 'signupProcess'])
//     ->name('signup.process');


Route::get('/libros', [\App\Http\Controllers\BooksController::class, 'all'])
    ->name('books.index')
    ->middleware('auth')
    ->middleware('is-admin');

Route::get('/libros/nuevo', [\App\Http\Controllers\BooksController::class, 'createForm'])
    ->name('books.create.form')
    ->middleware('auth')
    ->middleware('is-admin');
Route::post('/libros/nuevo', [\App\Http\Controllers\BooksController::class, 'createProcess'])
    ->name('books.create.process')
    ->middleware('auth')
    ->middleware('is-admin');

Route::get('/libros/{id}', [\App\Http\Controllers\BooksController::class, 'view'])
    ->name('books.view')
    ->whereNumber('id')
    ->middleware('auth')
    ->middleware('is-admin');

Route::get('/libros/{id}/editar', [\App\Http\Controllers\BooksController::class, 'editForm'])
    ->name('books.edit.form')
    ->whereNumber('id')
    ->middleware('auth')
    ->middleware('is-admin');
Route::post('/libros/{id}/editar', [\App\Http\Controllers\BooksController::class, 'editProcess'])
    ->name('books.edit.process')
    ->whereNumber('id')
    ->middleware('auth')
    ->middleware('is-admin');

Route::get('/libros/{id}/eliminar', [\App\Http\Controllers\BooksController::class, 'deleteForm'])
    ->name('books.delete.form')
    ->whereNumber('id')
    ->middleware('auth')
    ->middleware('is-admin');
Route::post('/libros/{id}/eliminar', [\App\Http\Controllers\BooksController::class, 'deleteProcess'])
    ->name('books.delete.process')
    ->whereNumber('id')
    ->middleware('auth')
    ->middleware('is-admin');


Route::get('/novedades', [\App\Http\Controllers\PublicationsController::class, 'all'])
    ->name('publications.index')
    ->middleware('auth')
    ->middleware('is-admin');

Route::get('/novedades/nueva', [\App\Http\Controllers\PublicationsController::class, 'createForm'])
    ->name('publications.create.form')
    ->middleware('auth')
    ->middleware('is-admin');
Route::post('/novedades/nueva', [\App\Http\Controllers\PublicationsController::class, 'createProcess'])
    ->name('publications.create.process')
    ->middleware('auth')
    ->middleware('is-admin');

Route::get('/novedades/{id}', [\App\Http\Controllers\PublicationsController::class, 'view'])
    ->name('publications.view')
    ->whereNumber('id')
    ->middleware('auth')
    ->middleware('is-admin');

Route::get('/novedades/{id}/editar', [\App\Http\Controllers\PublicationsController::class, 'editForm'])
    ->name('publications.edit.form')
    ->whereNumber('id')
    ->middleware('auth')
    ->middleware('is-admin');
Route::post('/novedades/{id}/editar', [\App\Http\Controllers\PublicationsController::class, 'editProcess'])
    ->name('publications.edit.process')
    ->whereNumber('id')
    ->middleware('auth')
    ->middleware('is-admin');

Route::get('/novedades/{id}/eliminar', [\App\Http\Controllers\PublicationsController::class, 'deleteForm'])
    ->name('publications.delete.form')
    ->whereNumber('id')
    ->middleware('auth')
    ->middleware('is-admin');
Route::post('/novedades/{id}/eliminar', [\App\Http\Controllers\PublicationsController::class, 'deleteProcess'])
    ->name('publications.delete.process')
    ->whereNumber('id')
    ->middleware('auth')
    ->middleware('is-admin');


Route::get('/productos', [\App\Http\Controllers\ProductsController::class, 'all'])
    ->name('products.index');

Route::get('/productos/{id}', [\App\Http\Controllers\ProductsController::class, 'view'])
    ->name('products.view')
    ->whereNumber('id');

Route::post('/agregarProducto/{id}', [\App\Http\Controllers\ProductsController::class, 'addCart'])
    ->name('products.add.cart')
    ->whereNumber('id')
    ->middleware('auth');


Route::get('/carrito', [\App\Http\Controllers\MercadoPagoController::class, 'show'])
    ->name('cart.view')
    ->middleware('auth');

Route::get('/carrito/success', [\App\Http\Controllers\MercadoPagoController::class, 'successProcess'])
    ->name('cart.successProcess');
Route::get('/carrito/pending', [\App\Http\Controllers\MercadoPagoController::class, 'pendingProcess'])
    ->name('cart.pendingProcess');
Route::get('/carrito/failure', [\App\Http\Controllers\MercadoPagoController::class, 'failureProcess'])
    ->name('cart.failureProcess');



Route::post('/carrito/{id}', [\App\Http\Controllers\MercadoPagoController::class, 'deleteProcess'])
    ->name('cart.delete.process')
    ->whereNumber('id')
    ->middleware('auth');

Route::post('/carrito', [\App\Http\Controllers\MercadoPagoController::class, 'clearProcess'])
    ->name('cart.clear.process')
    ->middleware('auth');

Route::get('/perfil', [\App\Http\Controllers\OrdersController::class, 'show'])
    ->name('profile.index')
    ->middleware('auth');
Route::get('/perfil/{id}', [\App\Http\Controllers\UsersController::class, 'editForm'])
    ->name('profile.edit.form')
    ->whereNumber('id')
    ->middleware('auth');
Route::post('/perfil/{id}', [\App\Http\Controllers\UsersController::class, 'editProcess'])
    ->name('profile.edit.process')
    ->whereNumber('id')
    ->middleware('auth');

Route::get('/publicaciones', [\App\Http\Controllers\NoveltyController::class, 'all'])
    ->name('news.index');

Route::get('/publicaciones/{id}', [\App\Http\Controllers\NoveltyController::class, 'view'])
    ->name('news.view')
    ->whereNumber('id');

Route::get('/usuarios', [\App\Http\Controllers\UsersController::class, 'all'])
    ->name('users.index')
    ->middleware('auth')
    ->middleware('is-admin');
Route::get('/usuarios/{id}', [\App\Http\Controllers\UsersController::class, 'view'])
    ->name('users.view')
    ->whereNumber('id')
    ->middleware('auth')
    ->middleware('is-admin');