<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable=['role_name'];

    //accessor
    public function getStatusAttribute($status)
    {
        if($status ==1)
        {
            return 'Active';
        }else{
            return 'Inactive';
        }
    }

}
