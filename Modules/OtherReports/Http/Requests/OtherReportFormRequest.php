<?php

namespace Modules\OtherReports\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtherReportFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vcs_passport_payment'          => 'required',
            'gcc_payment'                   => 'required',
            'visa_attachment'               => 'required',
            'ticket_copy'                   => 'required',
            'passport_copy'                 => 'required',
            'pcr_test_result'               => 'required',
            'ministry_clearance_letter'     => 'required',
            'yellow_book'                   =>'required',
            'covid'                         =>'required',
            'departure_medical'             =>'required',
            'training_certificate'          =>'required',
            'dw_at_other_reports_level_id'  => 'unique:other_reports',
            'created_by'           =>'',
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
