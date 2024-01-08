<?php

namespace App\Repositories;

use App\Models\BloodDonor;

/**
 * Class BloodDonorRepository
 * @version February 17, 2020, 11:06 am UTC
 */
class BloodDonorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'age',
        'gender',
        'blood_group',
        'last_donate_date',
    ];

    
    
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BloodDonor::class;
    }
}
