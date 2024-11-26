<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AccountsController;
use App\Http\Controllers\Api\SubjectsController;
use App\Http\Controllers\Api\SectionsController;
use App\Http\Controllers\Api\LecturesController;
use App\Http\Controllers\Api\LectureExamsController;
use App\Http\Controllers\Api\LaboratorySubmissionsController;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->name('auth.login');
        Route::post('signup', [AuthController::class, 'signup'])->name('auth.signup');

        Route::middleware('auth:sanctum')->group(function() {
            Route::get('me', [AuthController::class, 'me'])->name('auth.me');
            Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
        });
    });

    Route::apiResource('accounts', AccountsController::class);
    Route::get('accounts-filtered/{type}', [AccountsController::class, 'index']);
    Route::apiResource('subjects', SubjectsController::class);
    Route::apiResource('sections', SectionsController::class);
    Route::apiResource('lectures', LecturesController::class);
    Route::apiResource('lecture-exams', LectureExamsController::class);
    Route::post('lecture-update-module/{id}', [LecturesController::class, 'updateModule']);
    Route::post('lab-submit', [LaboratorySubmissionsController::class, 'submit']);
    Route::get('my-laboratories/{userId}', [LaboratorySubmissionsController::class, 'myLabs']);
    Route::get('get-teacher-laboratories/{teacherId}', [LecturesController::class, 'getListByTeacher']);
    Route::get('get-laboratory-submissions/{laboratoryId}', [LaboratorySubmissionsController::class, 'getSubmissionByLab']);
});


