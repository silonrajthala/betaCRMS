<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsertypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

Route::get('/', function () {
    return redirect("login");
});


    Route::get('logout', [LoginController::class, 'logout']);
    Route::resource('login',LoginController::class);


    Route::group(['middleware' => 'admin'], function(){
    
        Route::resource('dashboard', DashboardController::class);

        Route::resource('usertype', UsertypeController::class);

        Route::resource('user', UserController::class);

        Route::resource('menu', MenuController::class);

        Route::post('permission/getSubmenuData', [PermissionController::class,'SubmenuData']);
         Route::post('permission/getUsergroupWiseFormMenuData', [PermissionController::class,'UsergroupWiseFormMenuData']);
         Route::post('permission/setformpermission', [PermissionController::class,'setformpermission']);
         Route::get('permission/form', [PermissionController::class,'formPermission']);
         Route::resource('permission', PermissionController::class);


});
Route::get('/send-email', function () {
    $recipient = 'seelon.rajthala.7@gmail.com';
    $data = ['subject'=>'TEST subject'
    ,'message' => 'This is a test email with dynamic content.','view'=>'emails/sample'];
    try {
        Config::set('mail.from.name', 'SILON RAJTHALA');
        Mail::to($recipient)->send(new TestMail($data));
        return 'Email sent successfully!';
    } catch (Exception $e) {
        return 'Failed to send email: ' . $e->getMessage();
    }
});
