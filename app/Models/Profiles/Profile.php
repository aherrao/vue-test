<?php

namespace App\Models\Profiles;

use App\Models\BaseModel;

class Profile extends BaseModel
{
    /**
     * Define model attributes
     *
     * @return array
     */
    public static function defineModel()
    {
        return [
            'is_admin'
        ];
    }

    public static function saveProfile($objRequest, $intId = 0) {

        $objProject = self::find($intId) ?? new self();

        $objProject->save();

        return $objProject;
    }
}
