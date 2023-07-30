<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $fillable = ['name'];

//    public function leaders(): HasMany
//    {
//        return $this->hasMany(Leader::class);
//    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
