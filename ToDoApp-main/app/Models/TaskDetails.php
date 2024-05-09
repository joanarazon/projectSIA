<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDetails extends Model
{
    use HasFactory;

    protected $table = 'task_details';

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

}
