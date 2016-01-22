<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\DownloadLog
 *
 * @property integer $id
 * @property string $ip
 * @property string $user_agent
 * @property integer $file_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\DownloadLog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DownloadLog whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DownloadLog whereUserAgent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DownloadLog whereFileId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DownloadLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\DownloadLog whereUpdatedAt($value)
 * @method static \App\DownloadLog|null find($id)
 */
class DownloadLog extends Model
{
    protected $table='download_log';
}
