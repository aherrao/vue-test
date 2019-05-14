<?php
namespace App\Models\Sprints;

use App\Models\BaseModel;

class Sprint extends BaseModel
{
    use SprintRelationship;

    /**
     * Define model attributes
     *
     * @return array
     */
    public static function defineModel()
    {
        return [
            'defined_fields' => [
                'client_id'
            ]
        ];
    }

    public static function saveSprint($objRequest, $intId = 0) {

        $objSprint = self::find($intId) ?? new self();

        $objSprint->name = $objRequest->name;
        $objSprint->description = $objRequest->description;
        $objSprint->project_id = $objRequest->project_id;

        if($objRequest->start_date){
            $objSprint->start_date = date('Y/m/d', strtotime($objRequest->start_date));
        }

        if($objRequest->release_date) {
            $objSprint->release_date = date('Y/m/d', strtotime($objRequest->release_date));
        }

        $objSprint->save();

        return $objSprint;
    }
}
