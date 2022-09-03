<?php

namespace Modules\ClearanceModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClearanceFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'clearance_for_contract'         => '',
            'clearance_for_medical'          => '',
            'clearance_for_interpol'         => '',
            'passport_bio_data'              => '',
            'ministry_clearance_letter'      => '',
            'gcc'                            => '',
            'training_report'                =>'',
            'ticket'                         =>'',
            'yellow_book'                    =>'',
            'covid'                          =>'',
            'departure_medical'              =>'',
            'domestic_worker_id'             => 'unique:clearances',
            'created_by'                     =>'',
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
