<?php

namespace Modules\JobOrder\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequestForm extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'                     =>'',
            'abroadcompany_id'       =>'',
            'number_of_dws_required' =>'max:255',
            'number_of_dws_taken'    =>'max:255',
            'amount_deposited'       =>'max:255',
            'total_amount'           =>'max:255',
            'proof_of_payment'       =>'',
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
