<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $fillable = ['name', 'email', 'room_id'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'leader_student');
    }

    public function leader_students()
    {
        return $this->belongsToMany(Student::class, 'leader_student');
    }
    //finished making the room model and migration. started but did not
    //finish the model and migration for leader. I was working on the relationships between the tables
    //specifically the intermediate table leader_student
}
