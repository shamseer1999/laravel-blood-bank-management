<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donner extends Model
{
    use HasFactory;

    protected $fillable=[
        'first_name',
        'last_name',
        'phone',
        'email',
        'city',
        'district',
        'address',
        'profile_image',
        'age',
        'dob',
        'donner_job',
        'height',
        'weight',
        'blood_group'
    ];

    public function districts()
    {
        return $this->hasOne(District::class,'id','district');
    }
}
