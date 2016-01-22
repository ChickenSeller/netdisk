<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BrowseLog
 *
 * @property integer $id
 * @property string $ip
 * @property string $user_agent
 * @property string $page
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\BrowseLog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BrowseLog whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BrowseLog whereUserAgent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BrowseLog wherePage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BrowseLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\BrowseLog whereUpdatedAt($value)
 * @method static \App\BrowseLog|null find($id)
 */
class BrowseLog extends Model
{
    protected $table='browse_log';
}
