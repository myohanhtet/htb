<?php

namespace App\Repositories;

use App\Models\Doner;
use App\Repositories\BaseRepository;

/**
 * Class DonerRepository
 * @package App\Repositories
 * @version December 3, 2019, 12:04 am +0630
 *
 * @method Doner findWithoutFail($id, $columns = ['*'])
 * @method Doner find($id, $columns = ['*'])
 * @method Doner first($columns = ['*'])
*/
class DonerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'email',
        'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Doner::class;
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
