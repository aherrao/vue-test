<?php
namespace App\Models\Sprints;

use App\Models\Projects\Project;

trait SprintRelationship {

    public function sprints()
    {
        return $this->hasbelongsTo(Project::class);
    }
}