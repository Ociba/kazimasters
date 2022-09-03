<?php

namespace Modules\PassportModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPassportFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'dw_nin'                => 'required|max:255',
            'parent_nin'            => 'required|max:255',
            'nok_nin'               => 'required|max:5128',
            'domestic_worker_id'    => 'required',
            'passport'       => '',
            'created_by'            =>'',
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
