<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DebitVoucherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'voucher_no' => 'required',
            'bank_cash_id' => 'required',
            'project_id' => 'required',
            'ledger_name_id' => 'required',
            'amount' => 'required',
            'particulars' => 'required',
            'voucher_date' => 'required',
            'status' => 'required'
        ];
    }
}
