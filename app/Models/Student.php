<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model {
    use HasFactory;

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }


}
