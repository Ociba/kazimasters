<?php

namespace Modules\PremedicalModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDomesticWorkerAtPreMedicalFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'domestic_worker_id' => '',
            'registration_status'            => '',
            'premedical_report'              => 'required',
            'issuing_officer'                => 'max:255|required',
            'issue'                          => 'max:255',
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
