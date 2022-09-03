<?php

namespace Modules\TrainingModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDWTrainingPerformanceFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'training_performance_report'   => '',
            'contract'                      => '',
            'visa_number'                   => 'required',
            'dw_id_worker'                  => '',
            'created_by'                    =>'',
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
