<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Leader extends Model
{
    protected $fillable = ['name', 'email', 'room_id'];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'leader_student');
    }

    public function leader_students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'leader_student');
    }
    //finished making the room model and migration. started but did not
    //finish the model and migration for leader. I was working on the relationships between the tables
    //specifically the intermediate table leader_student
}
