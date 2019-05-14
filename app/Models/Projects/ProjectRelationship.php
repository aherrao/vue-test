<?php
namespace App\Models\Projects;

use App\Models\ProjectTeammates\ProjectTeammate;
use App\Models\Users\User;
use App\Models\Sprints\Sprint;

trait ProjectRelationship {

    public function sprints()
    {
        return $this->hasMany(Sprint::class);
    }

    public function projectTeammates()
    {
        return $this->hasMany(ProjectTeammate::class);
    }

    public function assigneeIdUsers()
    {
        return $this->belongsToMany(User::class, 'project_teammates', 'project_id', 'assignee_id');
    }
}