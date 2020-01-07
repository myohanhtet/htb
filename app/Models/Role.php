<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Role
 * @package App\Models
 * @version January 6, 2020, 8:22 pm +0630
 *
 * @property \App\Models\ModelHasRole modelHasRole
 * @property \Illuminate\Database\Eloquent\Collection permissions
 * @property string name
 * @property string guard_name
 */
class Role extends Model
{

    public $table = 'roles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'guard_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'guard_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'guard_name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function modelHasRole()
    {
        return $this->hasOne(\App\Models\ModelHasRole::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function permissions()
    {
        return $this->belongsToMany(\App\Models\Permission::class, 'role_has_permissions');
    }
}
