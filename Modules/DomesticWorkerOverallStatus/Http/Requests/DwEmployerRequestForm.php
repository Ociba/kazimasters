<?php

namespace Modules\DomesticWorkerOverallStatus\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DwEmployerRequestForm extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'domestic_worker_id' =>'',
            'company_id'         =>'',
            'employer_name'      => '',
            'employer_contact'   =>'',
            'visa'               =>'required',
            'created_by'         =>'',
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
