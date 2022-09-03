<?php

namespace Modules\TrainingModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkerTrainingSchoolForm extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'training_school_id' =>'',
            'domestic_worker_id' =>'',
            'created_by'         =>'',
            'date_of_allocation' =>'required | max:255',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
