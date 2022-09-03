<?php

namespace Modules\TrainingModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingSchoolForm extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'school_name' =>'required | max:255',
            'location'    =>'required',
            'created_by'  =>'',
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
