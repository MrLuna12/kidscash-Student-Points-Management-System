<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Room;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\MockObject\Builder\Stub;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Student::truncate();
        Room::truncate();

        // //Creating Students
        // Student::create([
        // 'name' => 'Cecelia Robel',
        // 'dob' => '2016-07-15 00:00:00',
        // 'room_id' => 5,
        // 'points' => '64'
        // ]);

        // Student::create([
        //     'name' => 'Deidra Luna',
        //     'dob' => '2015-12-19 00:00:00',
        //     'room_id' => 5,
        //     'points' => '64'
        // ]);

        // Student::create([
        //     'name' => 'Michael Luna',
        //     'dob' => '2015-11-19 00:00:00',
        //     'room_id' => 5,
        //     'points' => '64'
        // ]);

        // Student::create([
        //     'name' => 'John Smith',
        //     'dob' => '2019-06-04 00:00:00',
        //     'room_id' => 4,
        //     'points' => '64'

        // ]);

        // Student::create([
        //     'name' => 'Jane Robert',
        //     'dob' => '2021-05-10 00:00:00',
        //     'room_id' => 2,
        //     'points' => '64'
        // ]);

        // Student::create([
        //     'name' => 'Sally May',
        //     'dob' => '2020-04-27 00:00:00',
        //     'room_id' => 3,
        //     'points' => '164'
        // ]);

        // Student::create([
        //     'name' => 'Peter Parker',
        //     'dob' => '2016-01-22 00:00:00',
        //     'room_id' => 5,
        //     'points' => '234'
        // ]);

        // Student::create([
        //     'name' => 'Eddie Brock',
        //     'dob' => '2021-09-09 00:00:00',
        //     'room_id' => 1,
        //     'points' => '432'
        // ]);

        // Student::create([
        //     'name' => 'Tony Starks',
        //     'dob' => '2014-04-19 00:00:00',
        //     'room_id' => 5,
        //     'points' => '356'
        // ]);

        // Student::create([
        //     'name' => 'Bruce Banner',
        //     'dob' => '2013-07-04 00:00:00',
        //     'room_id' => 5,
        //     'points' => '102'
        // ]);

        // Student::create([
        //     'name' => 'Steve Rogers',
        //     'dob' => '2019-09-10 00:00:00',
        //     'room_id' => 3,
        //     'points' => '234'
        // ]);



        // // Creating Rooms
        // Room::create([
        //     'name' => 'Nursery',
        //     'min_age' => 0,
        //     'max_age' => 2
        // ]);

        // Room::create([
        //     'name' => 'Discovery',
        //     'min_age' => 2,
        //     'max_age' => 3
        // ]);

        // Room::create([
        //     'name' => 'Wonder',
        //     'min_age' => 3,
        //     'max_age' => 4
        // ]);

        // Room::create([
        //     'name' => 'Clubhouse',
        //     'min_age' => 4,
        //     'max_age' => 5
        // ]);

        // Room::create([
        //     'name' => 'Factory',
        //     'min_age' => 6,
        //     'max_age' => 11
        // ]);
    }
}
