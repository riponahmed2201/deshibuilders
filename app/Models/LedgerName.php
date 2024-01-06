<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerName extends Model
{
    use HasFactory;

    protected $table = 'ledger_names';
    protected $fillable = [
        'name', 'ledger_type', 'ledger_group', 'unit', 'type', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
