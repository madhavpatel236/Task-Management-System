<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManagerModel extends Model
{
    // protected $table = '';
    protected $table = 'task_list';
    protected $fillable = [
        'manager_name',
        'title',
        'description',
        'priority',
        'due date',
        'assignees',
        'status'
    ];
}
