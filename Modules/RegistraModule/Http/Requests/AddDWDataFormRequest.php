<?php

namespace Modules\RegistraModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDWDataFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'                   =>'',      
            'domestic_worker_at_recieptions_id' => '',
            'nationa_id_number'         => 'required|max:255',
            'desired_job'               => 'required|max:20',
            'parent_names'              => 'required|max:400',
            'office_or_premedical_fee'  => 'required|max:8',
            'education_level'           => 'required | max:255',
            'other_skills'              => 'required | max:255',
            'passport_status'           => '',
            'amount_in_words'           =>'required',
            'reason_for_payment'        =>'required',
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
