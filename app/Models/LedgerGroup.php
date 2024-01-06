<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerGroup extends Model
{
    use HasFactory;

    protected $table = 'ledger_groups';
    protected $fillable = [
        'name', 'description', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
