<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'task_name',
        'task_description',
        'task_status',
        'task_category',
    ];

    use HasFactory;
}
