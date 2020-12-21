<?php

namespace App\Repositories;

use App\Models\Htb;
use App\Repositories\BaseRepository;

/**
 * Class HtbRepository
 * @package App\Repositories
 * @version December 23, 2018, 12:24 pm UTC
 *
 * @method Htb findWithoutFail($id, $columns = ['*'])
 * @method Htb find($id, $columns = ['*'])
 * @method Htb first($columns = ['*'])
*/
class HtbRepository extends BaseRepository
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
        'address'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Htb::class;
    }
    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }
}
