<?php

namespace App\Http\Controllers;

use App\BrowseLog;
use App\DownloadLog;
use App\File;
use App\LeechLog;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    static public function LogDownload($file_id){
        $fileInfo = File::find(intval($file_id));
        if($fileInfo == null){
            return false;
        }
        $fileInfo->download_times +=1;
        $fileInfo->save();
        $log = new DownloadLog();
        $log->file_id = intval($file_id);
        $log->ip = LogController::getIP();
        $log->user_agent = LogController::getUA();
        $log->save();
        return true;
    }

    static public function LogBrowse($file_id){
        $fileInfo = File::find(intval($file_id));
        if($fileInfo == null){
            return false;
        }
        $fileInfo->view_times +=1;
        $fileInfo->save();
        $log = new BrowseLog();
        $log->page = $file_id;
        $log->ip = LogController::getIP();
        $log->user_agent = LogController::getUA();
        $log->save();
        return true;
    }

    static public function LogLeech($url){
        $log = new LeechLog();
        $log->url = $url;
        $log->ip = LogController::getIP();
        $log->user_agent = LogController::getUA();
        $log->save();
    }

    static public function getIP() {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        }
        elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        }
        elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');

        }
        elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        }
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    static public function getUA(){
        return $_SERVER['HTTP_USER_AGENT'];
    }
}
