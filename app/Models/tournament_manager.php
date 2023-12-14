<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tournament_manager extends Model
{
    use HasFactory;

    protected $fillable = ['agency', 'agency_tel', 'agency_email', 'manager_name', 'manager_tel', 'manager_email', 'coordinator_name', 'coordinator_tel',
    'coordinator_email', 'coordinator_line', 'date', 'coordinator_address', 'user_id'];
}
