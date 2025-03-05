<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController\AuthController;
use App\Http\Controllers\ApiController\ShipController;
use App\Http\Controllers\Api\Admin\AdminController;
use PHPOpenSourceSaver\JWTAuth\Http\Middleware\Authenticate;

// ✅ حماية استرجاع بيانات المستخدم عبر JWT
Route::middleware(Authenticate::class)->get('/user', function (Request $request) {
    return response()->json($request->user());
});

// ✅ مسارات المصادقة (JWT)
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware(Authenticate::class)->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
    });
});

// ✅ استخدام apiResource لمسارات CRUD الخاصة بالمسؤولين
Route::apiResource('admins', AdminController::class)->middleware(Authenticate::class);

// ✅ حماية مسارات `ships` باستخدام `Authenticate::class`
Route::middleware(Authenticate::class)->group(function () {
    Route::apiResource('ships', ShipController::class);
});
