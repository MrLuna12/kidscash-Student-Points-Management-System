<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'min_age', 'max_age'];

    public function leaders()
    {
        return $this->hasMany(Leader::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
