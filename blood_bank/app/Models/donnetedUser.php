<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donnetedUser extends Model
{
    use HasFactory;

    protected $table = 'donated_users';

    protected $fillable = [
        'donated_date','donner_id'
    ];
}
