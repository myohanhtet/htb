<?php

namespace App\Repositories;

use App\Models\Pathan;
use App\Repositories\BaseRepository;

/**
 * Class PathanRepository
 * @package App\Repositories
 * @version December 12, 2020, 2:54 pm +0630
 *
 * @method Pathan findWithoutFail($id, $columns = ['*'])
 * @method Pathan find($id, $columns = ['*'])
 * @method Pathan first($columns = ['*'])
*/
class PathanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pathan::class;
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
