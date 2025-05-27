<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $connenction = "Task_Management_System";
    protected $table = 'user_list';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];
}
