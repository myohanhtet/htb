<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class HtbRest
 * @package App\Models
 * @version May 19, 2020, 12:30 am +0630
 *
 * @property string $lucky_no
 * @property integer $amount
 * @property string $mtl
 * @property integer $mtl_vaule
 * @property string $donar
 * @property string $address
 * @property string $win_name
 */
class HtbRest extends Model
{

    public $table = 'htb';
    public $keyType = 'string';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'lucky_no',
        'amount',
        'mtl',
        'mtl_vaule',
        'donar',
        'address',
        'win_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lucky_no' => 'string',
        'amount' => 'integer',
        'mtl' => 'string',
        'mtl_vaule' => 'integer',
        'donar' => 'string',
        'address' => 'string',
        'win_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'donar' => 'required',
        'address' => 'required'
    ];


}
