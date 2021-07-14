<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Doner
 * @package App\Models
 * @version December 3, 2019, 12:04 am +0630
 *
 * @property string name
 * @property string address
 * @property string email
 * @property string phone
 */
class Doner extends Model
{

    public $table = 'doners';
    public $keyType = 'string';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'address',
        'email',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'email' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
