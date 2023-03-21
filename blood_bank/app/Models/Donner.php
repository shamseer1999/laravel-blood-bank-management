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

    public function getBloodGroupTextAttribute()
    {
        if($this->blood_group ==1){
            return "A +ve";
        }elseif($this->blood_group ==2){
            return "B +ve";
        }elseif($this->blood_group ==3){
            return "AB +ve";
        }elseif($this->blood_group ==4){
            return "O +ve";
        }elseif($this->blood_group ==5){
            return "A -ve";
        }elseif($this->blood_group ==6){
            return "B -ve";
        }elseif($this->blood_group == 7){
            return "AB -ve";
        }else{
            return "O -ve";
        }
    }
    protected $appends=['blood_group_text'];
}
