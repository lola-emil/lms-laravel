<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\student\StudentDashboardController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Middleware\AdminRoleMiddleware;
use App\Http\Middleware\StudentRoleMiddleware;
use App\Http\Middleware\CustomAuthMiddleware;

Route::get('/', function () {
    return redirect("/signin");
});

Route::controller(AuthController::class)->group(function () {
    Route::get("/signin", "signInPage")->name("signin");
    Route::post("/signin", "signIn");
    Route::get("/logout", "logout");
});


Route::middleware(CustomAuthMiddleware::class)->group(function() {

    Route::prefix("student")->middleware(StudentRoleMiddleware::class)->group(function() {
        Route::get("/dashboard", [StudentDashboardController::class, "dashboardPage"]);

    });

    Route::prefix("/admin")->middleware(AdminRoleMiddleware::class)->group(function() {
        Route::get("/dashboard", [AdminDashboardController::class, "dashboardPage"]);
        Route::get("/add-user", [AdminDashboardController::class, "addUserPage"]);

    });
});
