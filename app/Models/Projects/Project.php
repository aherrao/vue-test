<?php
namespace App\Models\Projects;

use App\Models\BaseModel;

class Project extends BaseModel
{
    use ProjectRelationship, ProjectRepository;

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

    public static function saveProject($objRequest, $intId = 0) {

        $objProject = self::find($intId) ?? new self();

        $objProject->name = $objRequest->name;
        $objProject->key = $objRequest->key;
        $objProject->url = $objRequest->url;
        $objProject->lead_id = $objRequest->lead_id;

        if ($objProject->save() && is_array($objRequest->teammates)) {

            $arrIntUserIds = [];

            foreach($objRequest->teammates as $intKey => $intUserId) {
                $arrIntUserIds[$intUserId] = ['client_id' => auth()->user()->client_id];
            }

            $objProject->assigneeIdUsers()->sync($arrIntUserIds);
        }

        return $objProject;
    }
}
