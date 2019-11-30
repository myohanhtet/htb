<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Setting
 * @package App\Models
 * @version November 25, 2019, 2:00 pm +0630
 *
 * @property string name
 * @property string value
 */
class Setting extends Model
{

    public $table = 'settings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'value' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
