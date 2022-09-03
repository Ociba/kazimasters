<?php

namespace Modules\CompanyAgents\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyAgentsFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'           =>'',
            'first_name'   => 'required|max:255',
            'last_name'    => 'required|max:255',
            'other_names'  => 'max:255',
            'agent_nin'    => 'required|max:255',
            'phone_number' => 'required|max:25',
            'created_by'   =>'',
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
