<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Permission
 * @package App\Models
 * @version January 6, 2020, 8:23 pm +0630
 *
 * @property \App\Models\ModelHasPermission modelHasPermission
 * @property \Illuminate\Database\Eloquent\Collection roles
 * @property string name
 * @property string guard_name
 */
class Permission extends Model
{

    public $table = 'permissions';
    public $keyType = 'string';

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
    public function modelHasPermission()
    {
        return $this->hasOne(\App\Models\ModelHasPermission::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'role_has_permissions');
    }
}
