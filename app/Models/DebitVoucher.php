<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebitVoucher extends Model
{
    use HasFactory;

    protected $table = 'debit_vouchers';
    protected $fillable = [
        'voucher_no', 'bank_cash_id', 'project_id', 'ledger_name_id', 'amount', 'particulars', 'voucher_date', 'cheque_number', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
