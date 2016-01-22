<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Config;
use App\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class FileDownloadController extends Controller
{
    static public function GetAllFiles(){
        $files = File::all();
        return $files;
    }

    static public function GetFileInfoByID($id){
        $file = File::whereId(intval($id))->first();
        if($file == null){
            return false;
        }
        return $file;
    }

    static public function AddFile($arr){
        if($arr == null){
            return false;
        }
        $file = new File();
        $file->filename = $arr['filename'];
        $file->banned = 0;
        $file->size = $arr['size'];
        $file->description = $arr['description'];
        $file->file_path = $arr['filepath'];
        $file->uploader = $arr['uploader'];
        $file->download_times = 0;
        $file->view_times = 0;
        $file->save();
        return $file->id;
    }

    static public function DownloadFile(){
        $id = intval(Input::get('file_id'));
        $fileInfo = File::whereId($id)->whereBanned(false)->first();
        if($fileInfo==null){
            abort(404);
        }
        $config = Config::whereKey('file_dir')->whereApplied(true)->first();
        $sourceFile = $config->value.$fileInfo->file_path;
        $outFile = $fileInfo->filename;
        if (!is_file($sourceFile)) {
            abort(404);
        }
        LogController::LogDownload($id);
        $len = filesize($sourceFile); //获取文件大小
        $filename = basename($sourceFile); //获取文件名字
        $ctype=FileDownloadController::GetFileExtension($outFile);
        //echo $outFile;
        header("Cache-Control: public");
        header("Content-Type: $ctype");
        header("Content-Disposition: attachment; filename=" . $outFile);
        header("Accept-Ranges: bytes");
        $size = filesize($sourceFile);
        $range = 0;
        if (isset ($_SERVER['HTTP_RANGE'])) {
            list ($a, $range) = explode("=", $_SERVER['HTTP_RANGE']);
            str_replace($range, "-", $range);
            $size2 = $size -1; //文件总字节数
            $new_length = $size2 - $range;
            header("HTTP/1.1 206 Partial Content");
            header("Content-Length: $new_length");
            header("Content-Range: bytes $range$size2/$size");
        } else {
            $size2 = $size -1;
            header("Content-Range: bytes 0-$size2/$size");
            header("Content-Length: " . $size);
        }

        $fp = fopen("$sourceFile", "rb");
        fseek($fp, $range);
        while (!feof($fp)) {
            set_time_limit(0);
            print (fread($fp, 1024 * 8));
            flush();
            ob_flush();
        }
        fclose($fp);
        exit ();

    }

    static public function BanFile($id){
        $file = File::find($id);
        if($file==null){
            return false;
        }
        $file->banned=true;
        $file->save();
        return true;
    }

    static public function GetFileExtension($filename){
        $outFile_extension = strtolower(substr(strrchr($filename, "."), 1));
        $ctype="";
        switch($outFile_extension){
            case "exe" :
                $ctype = "application/octet-stream";
                break;
            case "zip" :
                $ctype = "application/zip";
                break;
            case "mp3" :
                $ctype = "audio/mpeg";
                break;
            case "mpg" :
                $ctype = "video/mpeg";
                break;
            case "avi" :
                $ctype = "video/x-msvideo";
                break;
            case "rar":
                $ctype = "application/octet-stream";
                break;
            default :
                $ctype = "application/force-download";
        }
        return $ctype;
    }

}
