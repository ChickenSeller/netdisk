<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\LeechLog
 *
 * @property integer $id
 * @property string $ip
 * @property string $user_agent
 * @property string $url
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\LeechLog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\LeechLog whereIp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\LeechLog whereUserAgent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\LeechLog whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\LeechLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\LeechLog whereUpdatedAt($value)
 * @method static \App\LeechLog|null find($id)
 */
class LeechLog extends Model
{
    protected $table='leech_log';
}
