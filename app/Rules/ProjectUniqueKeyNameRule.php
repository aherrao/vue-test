<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Projects\Project;

class ProjectUniqueKeyNameRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $objProject = Project::where('key', $value)->first();

        return (!$objProject || $objProject->id == request()->id );

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The key name should be unique.';
    }
}
