<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $primaryKey = 'account_id';
    protected $table = 'accounts';

    protected $fillable = [
        'username',
        'password',
    ];

    public function taskDetails()
    {
        return $this->hasMany(TaskDetails::class, 'account_id', 'account_id');
    }
}
