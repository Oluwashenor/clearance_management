<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserClearance extends Model
{
    protected $fillable = ['student_id', 'clearance_id'];
    use HasFactory;
}
