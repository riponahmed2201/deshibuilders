<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankCash extends Model
{
    use HasFactory;

    protected $table = 'bank_cashes';
    protected $fillable = [
        'name', 'account_number', 'description', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
