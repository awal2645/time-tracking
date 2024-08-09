<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Employee extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['first_name', 'last_name'];

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class);
    }
}

