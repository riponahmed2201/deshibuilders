<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerType extends Model
{
    use HasFactory;

    protected $table = 'ledger_types';
    protected $fillable = [
        'name', 'code', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
