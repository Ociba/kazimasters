<?php

namespace Modules\RecieptionModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDWDateFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'            =>'', 
            'dw_first_name'      => 'required|max:255',
            'dw_last_name'       => 'required|max:255',
            'dw_other_name'      => 'max:255',
            'reason_for_coming'  => 'required|max:1000',
            'premedical_status'  =>'',
            'created_by'         =>'',
            'gender'             =>'',
            'dw_contact'         =>'required',
            'dw_location'        =>'required',
            'next_of_kin'        =>'required',
            'nok_contact'        =>'required',
            'photo'              =>'',
            'passport_number'    =>'',
            'agent_id'           =>'',
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
