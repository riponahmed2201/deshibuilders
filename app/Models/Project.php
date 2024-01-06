<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = [
        'name', 'location', 'launching_date', 'hand_over_date', 'details', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'
    ];
}
