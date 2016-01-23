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
    return view('index')->with(['file_list'=>\App\Http\Controllers\FileDownloadController::GetAllFiles(),'title'=>'Kaguya的资源站']);
});
Route::get('view', function () {
    $file = \App\Http\Controllers\FileDownloadController::GetFileInfoByID(\Illuminate\Support\Facades\Input::get('file_id'));
    if($file==null){
        abort(404);
    }
    return view('detail')->with(['file'=>$file,'title'=>'资源详情-'.$file->filename]);
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
Route::get('download', function () {
    \App\Http\Controllers\FileDownloadController::DownloadFile();
});

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
