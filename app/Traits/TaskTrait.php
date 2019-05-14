<?php
namespace App\Traits;

use App\Models\Users\User;
use App\Models\TaskTypes\TaskType;
use App\Models\TaskPriorityTypes\TaskPriorityType;
use App\Models\TaskStatusTypes\TaskStatusType;
use Illuminate\Support\Facades\DB;
use App\Helpers\DataHelper;
use App\Models\Sprints\Sprint;

trait TaskTrait {

    private function getCommonDetails()
    {
        $arrStrStoryPointOptions = collect(DataHelper::storyPointOptions());
        $arrStrUserOptions = User::all(['id', DB::raw("name AS label")]);
        $arrStrRunningSprints = Sprint::whereNull('release_date')->get(['id', DB::raw("name AS label")]);
        $arrStrTaskPriorityOptions = TaskPriorityType::fetchTaskPriorityTypes();
        $arrStrTaskStatusOptions = TaskStatusType::fetchTaskStatusTypes();
        $arrStrTaskTypeOptions = TaskType::fetchTaskTypes();

        $this->arrOptions = collect([
            'story_points' => $arrStrStoryPointOptions,
            'task_types' => $arrStrTaskTypeOptions,
            'task_type_names' => $arrStrTaskTypeOptions->pluck('label', 'id'),
            'status_types' => $arrStrTaskStatusOptions,
            'priority_types' => $arrStrTaskPriorityOptions,
            'users' => $arrStrUserOptions,
            'user_names' => $arrStrUserOptions->pluck('label', 'id'),
            'sprints' => $arrStrRunningSprints,
            'sprint_names' => $arrStrRunningSprints->pluck('label', 'id')
        ]);
    }
}