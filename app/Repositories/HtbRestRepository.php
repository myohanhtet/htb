<?php

namespace App\Repositories;

use App\Models\HtbRest;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HtbRestRepository
 * @package App\Repositories
 * @version May 19, 2020, 12:30 am +0630
 *
 * @method HtbRest findWithoutFail($id, $columns = ['*'])
 * @method HtbRest find($id, $columns = ['*'])
 * @method HtbRest first($columns = ['*'])
*/
class HtbRestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lucky_no',
        'amount',
        'mtl',
        'mtl_vaule',
        'donar',
        'address',
        'win_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return HtbRest::class;
    }
}
