<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function () {
    $str = "
    <html>
    <body>
    <a href='download?file_id=1'>测试</a>
</body>
    </html>
    ";
    return $str;
});
Route::get('all-files',  function () {
    return \App\Http\Controllers\FileDownloadController::GetAllFiles();
});
Route::get('download', ['middleware'=>'referencefilter',function () {
    \App\Http\Controllers\FileDownloadController::DownloadFile();
}]);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
