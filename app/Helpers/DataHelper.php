<?php
namespace App\Helpers;

class DataHelper
{

    public static function clientTypes()
    {
        return [
            'Free-Trial',
            'Subscriber',
            'Enterprise',
            'Test',
        ];
    }

    public static function taskPriorityTypes()
    {
        return [
            'Normal',
            'High',
            'Urgent'
        ];
    }

    public static function taskStatusTypes()
    {
        return [
            'Open',
            'Dev in Progress',
            'In Review',
            'QA Ready',
            'QA in Progress',
            'Ready for Deployment',
            'Released',
            'Dev Ready',
            'Hold',
            'Cancelled',
            'Closed'
        ];
    }

    public static function taskTypes()
    {
        return [
            'Feature',
            'Improvement',
            'Bug',
            'Todo'
        ];
    }

    public static function storyPointOptions()
    {
        return [
            ['id' => 0, 'label' => 0],
            ['id' => 1, 'label' => 1],
            ['id' => 2, 'label' => 2],
            ['id' => 3, 'label' => 3],
            ['id' => 5, 'label' => 5],
            ['id' => 8, 'label' => 8],
            ['id' => 13, 'label' => 13],
            ['id' => 40, 'label' => 40],
            ['id' => 100, 'label' => 100]
        ];
    }
}
