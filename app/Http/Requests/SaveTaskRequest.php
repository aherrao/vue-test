<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
//         $validator->after(function ($validator) {
//             if ($this->somethingElseIsInvalid()) {
//                 $validator->errors()->add('field', 'Something is wrong with this field!');
//             }
//         });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'alpha_dash', 'max:255'],
            'sprint_id' => ['required', 'integer'],
            'task_type_id' => ['required', 'integer'],
            'task_status_type_id' => ['required', 'integer'],
            'task_priority_type_id' => ['required', 'integer'],
            'assignee_id' => ['required', 'integer'],
        ];
    }
}
