<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';
    protected $fillable = ['name'];

    public function employee(){
        return $this->hasMany(Employee::class, 'dept_id', 'id');
    }
}
