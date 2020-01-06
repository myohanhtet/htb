<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Htb
 * @package App\Models
 * @version December 23, 2018, 12:24 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection projectDomain
 * @property \Illuminate\Database\Eloquent\Collection projectSubdomain
 * @property string lucky_no
 * @property string amount
 * @property string mtl
 * @property string mtl_vaule
 * @property string donar
 * @property string address
 */
class Htb extends Model
{

    public $table = 'htb';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'lucky_no',
        'amount',
        'mtl',
        'mtl_vaule',
        'donar',
        'address',
        'win_name',
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
        'mtl_vaule' => 'string',
        'donar' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'donar' => 'required',
        'address' => 'required',
    ];

    
}
