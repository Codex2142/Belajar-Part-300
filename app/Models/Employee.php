<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $fillable = [
        'firstname',
        'lastname',
        'gender',
        'address',
        'dob',
        'dept_id',
        'status',
    ];

    public function department(){
        return $this->belongsTo(Department::class, 'dept_id','id');
    }
}
