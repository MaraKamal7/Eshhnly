<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\Admin\AdminController;

// ✅ حماية استرجاع بيانات المستخدم عبر JWT
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

// ✅ استخدام apiResource لمسارات CRUD الخاصة بالمسؤولين
//Route::apiResource('admins', AdminController::class)->middleware('auth:api');

// ✅ مسارات المصادقة (JWT)
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']); // ✅ إضافة مسار لاسترجاع بيانات المستخدم المسجل
        Route::post('/refresh', [AuthController::class, 'refresh']); // ✅ تجديد التوكن
    });
});
