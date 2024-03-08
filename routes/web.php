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


Route::get("/", "HomeController@index")->name("home");
Route::get("/page/about", "PageController@about")->name("page.about");
Route::get("/post/{id}", "PostController@post_view")->name("post.view");
Route::get("/user/{id}/bridge", "PostController@user_bridge")->name("user.bridge");
Route::get("/post/search", "HomeController@search")->name("post.search");


Route::group(["middleware" => "guest",], function () {
    Route::get("/reg", "security\RegController@index")->name("reg.create");
    Route::post("/reg", "security\RegController@store")->name("reg.store");
    Route::get("/login", "security\LoginController@index")->name("login.create");
    Route::post("/login", "security\LoginController@store")->name("login.store");
});


Route::group(["middleware" => "auth"], function () {
    Route::get("/post/create", "PostController@create")->name("post.create");
    Route::post("/post/create", "PostController@store")->name("post.store");

    Route::post("/comment/{post_id}/store", "CommentController@store")->name("comment.store");

    Route::get("/logout", "security\LoginController@logout")->name("logout");
    Route::get("/mail", "mails\MailController@welcome")->name("mail");
});

Route::group(["middleware" => "auth", "prefix" => "user", "namespace" => "user"], function () {
    Route::get("/profile", "UserController@profile")->name("user.profile");
    Route::get("/profile/edit", "UserController@profile_edit")->name("user.profile.edit");
    Route::post("/profile/store", "UserController@profile_edit_store")->name("user.profile.edit.store");

    Route::get("/profile/posts", "UserController@user_posts")->name("user.profile.posts");
    Route::get("/profile/post/{id}/edit", "PostController@post_edit")->name("user.profile.post.edit");
    Route::post("/profile/post/{id}/store", "PostController@post_store")->name("user.profile.post.store");
    Route::get("/profile/post/{id}/delete", "PostController@post_delete")->name("user.profile.post.delete");
});

Route::group(["middleware" => "auth", "prefix" => "admin", "namespace" => "admin"], function () {
    Route::get("/home", "AdminController@index")->middleware("admin");
});