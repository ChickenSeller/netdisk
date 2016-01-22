<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Config
 *
 * @property integer $id
 * @property string $key
 * @property string $value
 * @property boolean $applied
 * @method static \Illuminate\Database\Query\Builder|\App\Config whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Config whereKey($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Config whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Config whereApplied($value)
 * @method static \App\Config|null find($id)
 */
class Config extends Model
{
    //
}
