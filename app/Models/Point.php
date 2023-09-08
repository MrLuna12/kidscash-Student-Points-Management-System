<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['name', 'description', 'value'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
