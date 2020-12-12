<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Pathan
 * @package App\Models
 * @version December 12, 2020, 2:54 pm +0630
 *
 */
class Pathan extends Model
{

    public $table = 'pathan';
    


    public $fillable = [
        'amount','material','amount_mtl','doner','address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
