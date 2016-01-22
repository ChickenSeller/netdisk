<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\File
 *
 * @property integer $id
 * @property string $filename
 * @property string $uploader
 * @property string $description
 * @property string $file_path
 * @property boolean $banned
 * @property integer $view_times
 * @property integer $download_times
 * @property string $size
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\File whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereFilename($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereUploader($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereFilePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereBanned($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereViewTimes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereDownloadTimes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereSize($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\File whereUpdatedAt($value)
 * @method static \App\File|null find($id)
 */
class File extends Model
{
    //
}
